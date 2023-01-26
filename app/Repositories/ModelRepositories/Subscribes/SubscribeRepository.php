<?php
namespace App\Repositories\ModelRepositories\Subscribes;

use App\Models\Subscribes\Subscribe;
use App\Repositories\ContextRepository;
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
        $listSubscribesActives = $this->getListSubscribeActive();
        $subscribesActives = [];
        foreach ($listSubscribesActives as $itemSubscribe){
            array_push($subscribesActives , $itemSubscribe->subscribe_id);
        }

        $result = $this->model
            ->with("forms")
            ->where("subscribes.status" , 1)
            ->where("subscribes.selected" , 1)
            ->limit($limitSubscribe)
            ->whereNotIn('id', $subscribesActives)
            ->inRandomOrder()
            ->get();

        foreach ($result as $key => $itemSubscribe){
            $result[$key]->forms = $this->getLimitFromsInSubscribeThatActive($itemSubscribe->forms  , $limitForm);
        }

        return $result;
    }


    function GetListSubscribes($numInPage = 15, int $limitForm = 6)
    {
        $result = $this->model
            ->select([
                "subscribes.id" ,"subscribes.title" ,"subscribes.real_price" ,"subscribes.off_price" ,"subscribes.duration" ,"subscribes.description" ,"subscribes.slug" ,
            ])
            ->where("subscribes.status" , 1);
        if ($limitForm > 0){
            $result =$result->with("forms");
        }
        $result = $result->paginate($numInPage);

        if ($limitForm > 0){
            foreach ($result as $key => $itemSubscribe){
                $result[$key]->forms = $this->getLimitFromsInSubscribeThatActive($itemSubscribe->forms  , $numInPage);
            }
            $result = $this->setStateActiveListSubscribe($result);
        }

        return $result;
    }


    function GetInfoSubscribe($slug, $numInPage = 8)
    {
        $result =
            $this->model
                ->where("slug" , $slug)
                ->where("status" , 1)
                ->first();

        if (!empty($result)){
            $result->active = $this->setStateActiveSubscribe($this->getListSubscribeActive() , $result->id);
            $result->info_forms = $result->forms()->paginate($numInPage);
            $result->forms = $this->getLimitFromsInSubscribeThatActive($result->info_forms  , $numInPage);
        }

        return $result;
    }


    function GetSlugSubscribeForm($subscribe_id)
    {
        $subscribe = ContextRepository::SubscribeRepository()->getResult($subscribe_id , true);
        $slug = "";
        if (!empty($subscribe)){
            $slug =  $subscribe->slug;
        }
        return $slug;
    }


    function getSqlSubscribeWithSlug($slug)
    {
        return  $this->model
            ->select("id")
            ->where("slug" , $slug)
            ->where("status" , 1)
            ->toSql();
    }





    //// ==================================
    private function readyImageForm($formImage){
        $imageForm = "";
        if (!empty($formImage)){
            $imageForm = $formImage["indexArray"][$formImage["currentImage"]];
        }
        return $imageForm;
    }

    private function getLimitFromsInSubscribeThatActive($result , $limitForm){
        $resultExp = [];
        foreach ($result As $key=>$itemForm ){
            if (($limitForm > 0 && sizeof($resultExp) < $limitForm) || $limitForm==0){
                $result[$key]-> image = $this->readyImageForm($itemForm["image"]);

                if (file_exists($result[$key]["image"])){
                    array_push($resultExp , $result[$key]);
                }
                else{
                    if ($limitForm==0){
                        $result[$key]-> image = "";
                        array_push($resultExp , $result[$key]);
                    }
                }

            }
        }
        return $resultExp;
    }




    ////// --------------------------

    private function getListSubscribeActive(){
        return ContextRepository::SubscribePaymentRepository()->GetSubscribeActiveNow();
    }

    private function setStateActiveListSubscribe($subscribes){
        $subscribesActive = $this->getListSubscribeActive();
        foreach ($subscribes as $key => $itemSubscribe){
            $subscribes[$key]["active"] = $this->setStateActiveSubscribe($subscribesActive , $itemSubscribe["id"]);
        }
        return $subscribes;
    }


    private function setStateActiveSubscribe($listSubscribeActive , $subscribe_id){
        $active = false;
        foreach ($listSubscribeActive As $item){
            if ($item->subscribe_id == $subscribe_id){
                $active = true;
                break;
            }
        }
        return $active;
    }



}

