<?php
namespace App\Repositories\ModelRepositories\Publics;

use App\Models\Publics\Setting;
use App\Repositories\InterFaceRepositories\Publics\ISettingRepository;
use App\Repositories\ModelRepositories\BaseRepository;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;

class SettingRepository extends BaseRepository implements ISettingRepository {

    public function __construct()
    {
        parent::__construct(new Setting());
    }


    function createItemSettingIfNotExist(string  $titleEn , string $titleFa , string $value): void
    {
        if (empty($this->model->where("titleEn" , $titleEn)->first())){

            $data = [
                "titleEn" => $titleEn,
                "titleFa" => $titleFa,
                "value" => $value,
            ];

            $this->addResult($data);
        }
    }



    function SetSettingInfoPage(): void
    {
        $settings = $this->getAllResult();
        $siteName = $this->getSiteName($settings);
        $socials = $this->getLocationSocialSite($settings);
        $aboutUs = $this->getAboutUsSite($settings);

        View::composer("customer.layouts.header" , function ($view) use($socials){
            $view->with("socials" , $socials);
        });

        View::composer("customer.layouts.footer" , function ($view) use($socials , $aboutUs , $siteName){
            $view->with("socials" , $socials);
            $view->with("aboutUs" , $aboutUs);
            $view->with("version" , Config::get("app.version"));
            $view->with("siteName" , $siteName);
        });
    }




    //// ====================================

    protected function getSiteName($setting){

        $siteName = [];

        foreach ($setting As $itemSetting){
            if ($itemSetting["titleEn"] == "site_name"){
                $siteName = $itemSetting["value"];
            }
        }

        return $siteName;
    }

    protected function getLocationSocialSite($setting){

        $resultExp = [];

        foreach ($setting As $itemSetting){

            if ($itemSetting["titleEn"] == "telegram" && $itemSetting["value"] != ""){
                $res["url"] = $itemSetting["value"];
                $res["title"] = "آدرس تلگرام";
                $res["icon"] = "fa fa-telegram";
                array_push($resultExp , $res);
            }
            else if ($itemSetting["titleEn"] == "instagram" && $itemSetting["value"] != ""){
                $res["url"] = $itemSetting["value"];
                $res["title"] = "آدرس ایستاگرام";
                $res["icon"] = "fa fa-instagram";
                array_push($resultExp , $res);
            }
            else if ($itemSetting["titleEn"] == "facebook" && $itemSetting["value"] != ""){
                $res["url"] = $itemSetting["value"];
                $res["title"] = "آدرس فیسبوک";
                $res["icon"] = "fa fa-facebook-square";
                array_push($resultExp , $res);
            }
            else if ($itemSetting["titleEn"] == "twitter" && $itemSetting["value"] != ""){
                $res["url"] = $itemSetting["value"];
                $res["title"] = "آدرس تویتر";
                $res["icon"] = "fa  fa-twitter-square";
                array_push($resultExp , $res);
            }

        }

        return $resultExp;
    }

    protected function getAboutUsSite($setting){

        $aboutUs = [];

        foreach ($setting As $itemSetting){
            if ($itemSetting["titleEn"] == "about_us"){
                $aboutUs = $itemSetting["value"];
            }
        }

        return $aboutUs;
    }

    protected function getInfoSit($setting){
        $info = [];

        foreach ($setting As $itemSetting){
            if ($itemSetting["titleEn"] == "address" && $itemSetting["value"] != null){
                $res=[
                    "title"=> "آدرس",
                    "value"=> $itemSetting["value"],
                ];
                array_push($info , $res);
            }
            else if ($itemSetting["titleEn"] == "site_email" && $itemSetting["value"] != null){
                $res=[
                    "title"=> "ایمیل",
                    "value"=> $itemSetting["value"],
                ];
                array_push($info , $res);
            }
            else if ($itemSetting["titleEn"] == "site_phone" && $itemSetting["value"] != null){
                $res=[
                    "title"=> "تلفن",
                    "value"=> $itemSetting["value"],
                ];
                array_push($info , $res);
            }
        }

        return $info;
    }
}