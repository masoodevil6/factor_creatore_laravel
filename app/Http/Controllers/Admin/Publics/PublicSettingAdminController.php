<?php

namespace App\Http\Controllers\Admin\Publics;

use App\Http\Controllers\Admin\MainAdminController;
use App\Http\Controllers\PanelCustomerController;
use App\Http\Requests\Admin\Publics\SettingRequest;
use App\Models\Publics\Setting;
use Illuminate\Http\Request;

class PublicSettingAdminController extends MainAdminController
{

    function __construct()
    {
        parent::__construct(route("admin.public.setting.index") , true);
    }


    public function index()
    {
        $nav = [
            "part"=> "بخش مدیریت های عمومی",
            "navigation" =>[
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "لیست تنظیمات ها "
                ]
            ]
        ];

        $settings = Setting::all();

        return view("admin.publics.setting.edit" , compact("nav" , "settings"));
    }


    public function update(SettingRequest $request)
    {
        $inputs = $request->all();

        $this->setValueSetting("site_name" ,  $inputs["site_name"]);
        $this->setValueSetting("site_phone" ,  $inputs["site_phone"]);
        $this->setValueSetting("site_email" ,  $inputs["site_email"]);
        $this->setValueSetting("address" ,  $inputs["address"]);

        $this->setValueSetting("facebook" ,  $inputs["facebook"]);
        $this->setValueSetting("instagram" ,  $inputs["instagram"]);
        $this->setValueSetting("telegram" ,  $inputs["telegram"]);
        $this->setValueSetting("twitter" ,  $inputs["twitter"]);


        $this->setValueSetting("about_us" ,  $inputs["about_us"]);


        if ($request->hasFile('image')){

            $dir = public_path("images/site")."/site";
            $this->deleteImage($dir.".webp");
            $this->deleteImage($dir.".png");
            $this->deleteImage($dir.".jpg");
            $this->deleteImage($dir.".jpeg");

            $this->uploadImageServer(
                $request->file("image") ,
                "images/site",
                "images/site/site" ,
                false ,
                "site",
                true
            );

        }

        if ($request->hasFile('icon')){

            $dir = public_path("images/site")."/site";
            $this->deleteImage($dir.".ico");

            $this->uploadFileServer(
                $request->file("icon") ,
                "images/site",
                "images/site/site" ,
                "site" ,
                true ,
                true
            );

        }

        return $this ->redirectIndex("اطلاعات با موفقیت ثبت شد ...");
    }



    private function setValueSetting($title , $value){
        $setting = Setting::where("titleEn" , $title)->first();
        if (!empty($setting)){
            $setting->update(["value" => $value]);
        }
    }

    private function deleteImage($imagePath){

        if (file_exists($imagePath)){
            unlink($imagePath);
        }
    }


}
