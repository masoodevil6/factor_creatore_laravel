<?php
namespace App\Repositories\ModelRepositories\Apps;

use App\Models\App\AppFileLink;
use App\Repositories\InterFaceRepositories\Apps\IAppFileLinkRepository;
use App\Repositories\ModelRepositories\BaseRepository;
use Illuminate\Support\Facades\View;


class AppFileLinkRepository extends BaseRepository implements IAppFileLinkRepository {

    public function __construct()
    {
        parent::__construct(new AppFileLink());
    }

    function SearchAppFileLink($appCategoryId = null ,$appFileId=null , $numInPage=15)
    {
        if ($appCategoryId!=null){
            $this->model = $this->model->where('app_category_id' , $appCategoryId);
        }

        if ($appFileId!=null){
            $this->model = $this->model->where('app_file_id' , $appCategoryId);
        }

        return $this->model->orderBy("id" , "desc")->paginate($numInPage);
    }



    public function GetListAppFileLink()
    {
        $linkApps = $this->ReadyListAppAndCategory($this->model->with("appCategory" , "appFile")->get());

        View::composer("customer.layouts.footer" , function ($view) use($linkApps){
            $view->with("linkApps" , $linkApps);
        });

        return $linkApps;
    }





    ///=======================================================

    private function ReadyListAppAndCategory($linkApps){

        $categories = $this->GetCategoriesLinkApp($linkApps);

        foreach ($categories as $key =>$itemCategory){
            $categories[$key]["apps"] = $this->GetAppsInCategory($itemCategory["id"] , $linkApps);
        }

        return $categories;
    }


    private function GetCategoriesLinkApp($linkApps){

        $categories = [];
        foreach ($linkApps as $itemApp){

            $cateExist= false;
            foreach ($categories As $itemCate){
                if ($itemApp->appCategory["id"] == $itemCate["id"]){
                    $cateExist =true;
                    break;
                }
            }

            if (!$cateExist){

                array_push($categories , $itemApp->appCategory->toArray());

            }

        }
        return $categories;

    }


    private function GetAppsInCategory($itemCategoryId , $linkApps){

        $apps = [];
        foreach ($linkApps as $itemApp){
            if ($itemApp->app_category_id == $itemCategoryId){

                $resultApp = [];
                $resultApp["id"] = $itemApp["id"];
                $resultApp["name"] = $itemApp["name"];
                $resultApp["image"] = $itemApp["image"];


                if (!empty($itemApp->appFile) && $itemApp->appFile!=null){
                    $resultApp["address"] = $itemApp->appFile->address;
                    $resultApp["app_name"] = $itemApp->appFile->name . " - " . $itemApp->appFile->version;
                }
                else{
                    $resultApp["address"] = $itemApp->address;
                    $resultApp["app_name"] = $itemApp["name"];
                }

                array_push($apps , $resultApp);
            }
        }

        return $apps;
    }


}