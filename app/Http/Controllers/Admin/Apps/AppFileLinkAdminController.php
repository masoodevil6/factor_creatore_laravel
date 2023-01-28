<?php

namespace App\Http\Controllers\Admin\Apps;

use App\Http\Controllers\Admin\MainAdminController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\App\AppLinkRequest;
use App\Models\App\AppFileLink;
use App\Repositories\ContextRepository;
use Illuminate\Http\Request;

class AppFileLinkAdminController extends MainAdminController
{

    function __construct()
    {
        parent::__construct(route("admin.apps.link.index" ), true);
    }




    public function index(){
        $nav = [
            "part"=> "بخش مدیریت برنامه ها",
            "navigation" =>[
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "لیست لینک برنامه ها"
                ]
            ]
        ];
        $appCategories = ContextRepository::AppCategoryRepository()->getAllResult();
        $appFiles = ContextRepository::AppFileRepository()->getAllResult();
        $appCategory = "";
        if (isset($_GET["category"])){
            $appCategory = $_GET["category"];
        }
        $appFile = "";
        if (isset($_GET["file"])){
            $appFile = $_GET["file"];
        }
        $appLinks = ContextRepository::AppFileLinkRepository()->SearchAppFileLink($appCategory , $appFile);
        return view("admin.App.link.index" , compact("nav" , "appCategories" , "appCategory" , "appFiles" , "appFile" , "appLinks"));
    }





    public function create(){
        /// navigation page
        $nav = [
            "part"=> "بخش مدیریت برنامه ها",
            "navigation" =>[
                [
                    "route" => "admin.apps.link.index" ,
                    "current" => 0,
                    "title" => "لیست اینک برنامه ها"
                ],
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "افزودن لینک برنامه"
                ]
            ]
        ];
        $appCategories = ContextRepository::AppCategoryRepository()->getAllResult();
        $appFiles = ContextRepository::AppFileRepository()->getAllResult();
        return view("admin.App.link.create" , compact("nav" , "appCategories" , "appFiles"));
    }

    public function store(AppLinkRequest $request){
        $input = $request->all();
        if ($request->hasFile('image')){
            $input["image"] = $this->uploadImageAppLink($request->file('image'));
        }
        ContextRepository::AppFileLinkRepository()->addResult($input);
        return $this ->redirectIndex("لینک فایل جدید برنامه با موفقیت اضافه شد");
    }








    public function edit(AppFileLink $appFileLink){
        /// navigation page
        $nav = [
            "part"=> "بخش مدیریت برنامه ها",
            "navigation" =>[
                [
                    "route" => "admin.apps.link.index" ,
                    "current" => 0,
                    "title" => "لیست اینک برنامه ها"
                ],
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "ویرایش لینک برنامه"
                ]
            ]
        ];
        $appCategories = ContextRepository::AppCategoryRepository()->getAllResult();
        $appFiles = ContextRepository::AppFileRepository()->getAllResult();
        return view("admin.App.link.create" , compact("nav" , "appCategories" , "appFiles" ,  "appFileLink"));
    }

    public function update(AppLinkRequest $request, AppFileLink $appFileLink){
        $input = $request->all();
        if ($request->hasFile('image')){
            $input["image"] = $this->uploadImageAppLink($request->file('image') , $appFileLink->image);
        }
        ContextRepository::AppFileLinkRepository()->updateResult($appFileLink , $input);
        return $this ->redirectIndex("لینک فایل برنامه با موفقیت اصلاح شد");
    }






    public function destroy(AppFileLink $appFileLink){
        $address = $appFileLink->address;
        $filePath = public_path($address);
        if (file_exists($filePath)){
            unlink($filePath);
        }
        ContextRepository::AppFileLinkRepository()->deleteResult($appFileLink);
        return $this ->redirectIndex("فایل برنامه با موفقیت حذف شد");
    }





    public function status(AppFileLink $appFileLink){
        $result = ContextRepository::AppFileLinkRepository()->changeStatusResult($appFileLink);
        if ($result["status"]){
            return $result["exp"];
        }
    }



    public function deleteImage(AppFileLink $appFileLink){

        $address = $appFileLink->image;
        $filePath = public_path($address);
        if (file_exists($filePath)){
            unlink($filePath);
        }

        ContextRepository::AppFileRepository()->updateResult($appFileLink , ["image" => null]);
        return $this ->redirectIndex("تصویر لینک با موفقیت حذف شد");
    }




    ////=================================================
    /// model
    /// =================================================

    private function uploadImageAppLink($image , $lastImage=null){

        $resultUploadImage = $this->uploadImageServer(
            $image ,
            "apps".DIRECTORY_SEPARATOR."images" ,
            $lastImage ,
            false ,
            "",
            true
        );

        return $resultUploadImage;
    }

}
