<?php
namespace App\Repositories\ModelRepositories\Subscribes;

use App\Models\Subscribes\SubscribePayment;
use App\Repositories\ContextRepository;
use App\Repositories\InterFaceRepositories\Subscribes\ISubscribePaymentRepository;
use App\Repositories\ModelRepositories\BaseRepository;
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
}