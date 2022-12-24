<?php

namespace App\Models\Publics;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Setting extends Model
{
    use HasFactory;
    use HasFactory;



    protected $fillable = [
        "titleEn" , "titleFa" , "value"
    ];



    //// ===================================================
    /// Site data
    /// ====================================================

    public function getSitData(){

        $settings = $this->all();
        $socials = $this->getLocationSocialSite($settings);
        $aboutUs = $this->getAboutUsSite($settings);
        $siteName = $this->getSiteName($settings);

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
