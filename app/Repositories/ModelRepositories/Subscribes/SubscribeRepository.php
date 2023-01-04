<?php
namespace App\Repositories\ModelRepositories\Subscribes;

use App\Models\Subscribes\Subscribe;
use App\Repositories\InterFaceRepositories\Subscribes\ISubscribeRepository;
use App\Repositories\ModelRepositories\BaseRepository;
use Illuminate\Support\Facades\DB;


class SubscribeRepository extends BaseRepository implements ISubscribeRepository {

    public function __construct()
    {
        parent::__construct(new Subscribe());
    }


    function SearchSubscribe(string $subscribeName = "", $numInPage = 15)
    {
        if ($subscribeName != ""){
            $this->model = $this->addSearcher('title' , $subscribeName);
        }

        return $this->model->paginate($numInPage);
    }


    function GetLimitRandomSelectedSubscribe(int $limitSubscribe=10 , int $limitForm=6)
    {
        $result = DB::table("subscribes")
            ->select([
                "subscribes.id" ,"subscribes.title" ,"subscribes.real_price" ,"subscribes.off_price" ,"subscribes.duration" ,"subscribes.description" ,
                "Forms.id as form_id" , "Forms.name" , "Forms.image"
            ])
            ->from(function ($from) use ($limitSubscribe) {
                $from->from("subscribes")
                    ->where("subscribes.status" , 1)
                    ->where("subscribes.selected" , 1)
                    ->limit($limitSubscribe)->inRandomOrder();
            } , "subscribes")
            ->join("Forms" , "forms.subscribe_id" , "=" , "subscribes.id")
            ->get();

        return $this->readySubscribeAndForms($result , $limitForm);
    }



    //// ==================================
    private function readySubscribeAndForms($result , $limitForm){
        $resultExp = [];
        foreach ($result as $itemSubscribe){
            $existSubscribe = false;
            foreach ($resultExp as $item){
                if ($itemSubscribe->id == $item["id"]){
                    $existSubscribe = true;
                    break;
                }
            }

            if (!$existSubscribe){
                $resSubscribe = [
                    "id" => $itemSubscribe->id,
                    "title" => $itemSubscribe->title,
                    "real_price" => $itemSubscribe->real_price,
                    "off_price" => $itemSubscribe->off_price,
                    "duration" => $itemSubscribe->duration,
                    "description" => $itemSubscribe->description,
                    "forms" => $this->readyListFormsInSubscribe($result , $itemSubscribe->id , $limitForm)
                ];

                array_push($resultExp , $resSubscribe);
            }
        }

        return $resultExp;
    }

    private function readyListFormsInSubscribe($result , $subscribeId , $limitForm){
        $resultExp = [];
        foreach ($result as $itemForm){
            if ($subscribeId == $itemForm->id ){
                $existForm = false;
                foreach ($resultExp as $item){
                    if ($itemForm->form_id == $item["id"]){
                        $existForm = true;
                        break;
                    }
                }
                if (!$existForm) {
                    $resForm = [
                        "id" => $itemForm->form_id,
                        "name" => $itemForm->name,
                        "image" => $this->readyImageForm($itemForm->image )
                    ];
                    array_push($resultExp , $resForm);
                }
            }
        }
        return $this->getLimitFromsInSubscribeThatActive($resultExp  , $limitForm);
    }

    private function readyImageForm($formImage){
        $imageArray = json_decode($formImage , true);
        $imageForm = "";
        if (!empty($imageArray)){
            $imageForm = $imageArray["indexArray"][$imageArray["currentImage"]];
        }
        return $imageForm;
    }

    private function getLimitFromsInSubscribeThatActive($result , $limitForm){
        $resultExp = [];
        foreach ($result As $itemForm ){
            if (sizeof($resultExp) < $limitForm && file_exists($itemForm["image"])){
                array_push($resultExp , $itemForm);
            }
        }
        return $resultExp;
    }
}

