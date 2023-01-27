<?php
namespace App\Repositories\ModelRepositories\Subscribes;

use App\Models\Subscribes\SubscribePayment;
use App\Repositories\ContextRepository;
use App\Repositories\InterFaceRepositories\Subscribes\ISubscribePaymentRepository;
use App\Repositories\ModelRepositories\BaseRepository;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class SubscribePaymentRepository extends BaseRepository implements ISubscribePaymentRepository {

    public function __construct()
    {
        parent::__construct(new SubscribePayment());
    }


    function CreateRecordForUser(string $userEmail , array $data) : int
    {
        $user = ContextRepository::UserRepository()->GetUserWithEmail($userEmail);

        if (!empty($user)) {
            $data["user_id"] = $user->id;
            $data["email"] = $userEmail;

            $subscribePayment = $this->addResult($data);

            return $subscribePayment->id;
        }

        return 0;
    }


    function SearchSubscribePayment(string $userName = "", string $resNum = "", int $Status = -1, int $subscribe = 0, $numInPage = 15)
    {

        if ($userName != ""){
            $this->model = $this->model->join('users', function($join) use ($userName){
                $join->on('subscribe_payments.user_id', "=", 'users.id');
                $join
                    ->where(DB::raw("CONCAT(users.`name`, ' ', users.`family`)")  , "like" , $userName."%")
                    ->orWhere(DB::raw("CONCAT(users.`name`, ' ', users.`family`)")  , "like" , "%".$userName)
                    ->orWhere(DB::raw("CONCAT(users.`name`, ' ', users.`family`)")  , "like" , "%".$userName."%")
                    ->orWhere(DB::raw("CONCAT(users.`name`, ' ', users.`family`)")  , "like" , $userName);
            });
        }

        if ($resNum != ""){
            $this->model = $this->addSearcher('subscribe_payments.res_num' , $resNum);
        }

        if (in_array($Status , [0 , 1])){
            $this->model = $this->model->where('subscribe_payments.status' , $Status);
        }

        if ($subscribe > 0){
            $this->model = $this->model->where('subscribe_payments.subscribe_id' , $subscribe);
        }

        return $this->model->paginate($numInPage);
    }






    function GetAllSubscribeAuthUser($numInPage = 15)
    {
        $this->model = $this->model->select(
            "subscribe_payments.id" , "subscribe_payments.amount" ,"subscribe_payments.status" ,
            "subscribes.title" , "subscribes.real_price" , "subscribes.off_price" ,"subscribes.duration" ,
            DB::raw("subscribe_payments.created_at As time_start"), DB::raw("ADDDATE(subscribe_payments.created_at, INTERVAL subscribes.duration MONTH) As time_end"));

        $this->model = $this->model->join('subscribes', function($join){
            $join->on('subscribe_payments.subscribe_id', "=", 'subscribes.id');
            $join->where("subscribes.status"  , "1");
        });

        $result = $this->model
            ->where("subscribe_payments.user_id" , ContextRepository::UserRepository()->GetUserAuthId())
            ->paginate($numInPage);

        foreach ($result As $key => $item){
            $result[$key]["active"] =  $this->checkActiveSubscribe($item["time_start"] , $item["time_end"]);
        }
        return $result;
    }


    function GetInfoSubscribeAuthUser($subscribeId)
    {
        $this->model = $this->model->select(
            "subscribe_payments.id" , "subscribe_payments.amount" ,"subscribe_payments.status" ,
            "subscribes.title" , "subscribes.real_price" , "subscribes.off_price" ,"subscribes.duration" ,
            "forms.id as form_id" , "forms.name as form_name" ,
            DB::raw("subscribe_payments.created_at As time_start"), DB::raw("ADDDATE(subscribe_payments.created_at, INTERVAL subscribes.duration MONTH) As time_end"));


        $this->model = $this->model->join('subscribes', function($join){
            $join->on('subscribe_payments.subscribe_id', "=", 'subscribes.id');
            $join->where("subscribes.status"  , "1");
        });

        $this->model = $this->model->join('forms', 'forms.subscribe_id', "=", 'subscribes.id');

        $result = $this->model
            ->where("subscribe_payments.id" , $subscribeId)
            ->where("subscribe_payments.user_id" , ContextRepository::UserRepository()->GetUserAuthId())
            ->get();

        return $this->getInfoSubscribeUser($result);
    }


    function DeleteSubscribeAuthUser($subscribeId)
    {
        $subscribe = $this->model
            ->where("id" , $subscribeId)
            ->where("status" , 0)
            ->where("user_id" , ContextRepository::UserRepository()->GetUserAuthId())
            ->first();
        if (!empty($subscribe)){
            $subscribe->delete();
        }
    }




    function GetSubscribeActiveNow()
    {
        $this->resetClassModel();
        return $this->model
            ->select(
                [
                    "subscribe_payments.*" ,
                    "subscribes.*" ,
                    DB::raw("ADDDATE(subscribe_payments.time_set, INTERVAL subscribes.duration MONTH) as time_end")
                ]
            )
            ->join('subscribes', 'subscribe_payments.subscribe_id', "=", 'subscribes.id')
            ->where(DB::raw("CURRENT_TIMESTAMP") , "<=" , DB::raw("ADDDATE(subscribe_payments.time_set, INTERVAL subscribes.duration MONTH)"))
            ->get();
    }







    function GetSubscribeActiveNowWithTimeStamp()
    {
        $SubscribesActive = $this->GetSubscribeActiveNow();
        foreach ($SubscribesActive as $key => $itemSubscribe){
            $now = Carbon::now();
            $timerStart = Carbon::parse($itemSubscribe->time_set);
            $timerEnd = Carbon::parse($itemSubscribe->time_set)->addMonth($itemSubscribe->duration);

            $SubscribesActive[$key]-> start_to_now = $timerStart->diffInDays($now->toDateTimeString());
            $SubscribesActive[$key]-> now_to_end   = $now->diffInDays($timerEnd->toDateTimeString());
            $SubscribesActive[$key]-> start_to_end = $timerStart->diffInDays($timerEnd->toDateTimeString());
        }
        return $SubscribesActive;
    }




    /////=============================================


    private function getInfoSubscribeUser($result){
        $resultExp = [];

        if (sizeof($result) > 0){
            $resultExp = [
                "id" => $result[0]["id"] ,
                "amount" => $result[0]["amount"] ,
                "status" => $result[0]["status"] ,

                "title" => $result[0]["title"] ,
                "real_price" => $result[0]["real_price"] ,
                "off_price" => $result[0]["off_price"] ,
                "total_price" => ( $result[0]["real_price"] - $result[0]["off_price"] ) ,
                "duration" => $result[0]["duration"] ,

                "time_start" => $result[0]["time_start"] ,
                "time_end" => $result[0]["time_end"] ,
                "active" => $this->checkActiveSubscribe($result[0]["time_start"] , $result[0]["time_end"]) ,

                "forms" => $this->getListFormsInSubscribe($result)
            ];
        }

        return $resultExp;

    }


    private function getListFormsInSubscribe($result){

        $forms=[];
        foreach ($result As $itemResult){
            $existForm = false;
            foreach ($forms As $itemForm){
                if ($itemResult["form_id"] == $itemForm["form_id"]){
                    $existForm = true;
                    break;
                }
            }

            if (!$existForm){
                $res = [
                    "form_id" => $itemResult["form_id"] ,
                    "form_name" => $itemResult["form_name"] ,
                ];
                array_push($forms , $res);
            }
        }
        return $forms;
    }


    private function checkActiveSubscribe($timeStart , $timeEnd){

        $timeStart = Carbon::parse($timeStart)->timestamp;
        $timeEnd = Carbon::parse($timeEnd)->timestamp;
        if ($timeStart <= $timeEnd){
            return true;
        }
        return false;
    }





}