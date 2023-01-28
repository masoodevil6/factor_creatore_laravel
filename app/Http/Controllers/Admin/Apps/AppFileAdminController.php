<?php

namespace App\Http\Controllers\Admin\Apps;

use App\Http\Controllers\Admin\MainAdminController;
use App\Http\Requests\Admin\App\AppFileRequest;
use App\Models\App\AppFile;
use App\Repositories\ContextRepository;
use Illuminate\Http\Request;

class AppFileAdminController extends MainAdminController
{
    function __construct()
    {
        parent::__construct(route("admin.apps.file.index") , true);
    }



    public function index(){
        $nav = [
            "part"=> "بخش مدیریت برنامه ها",
            "navigation" =>[
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "لیست برنامه ها"
                ]
            ]
        ];

        $appCategories = ContextRepository::AppCategoryRepository()->getAllResult();

        $appCategory = "";
        if (isset($_GET["category"])){
            $appCategory = $_GET["category"];
        }

        $appFiles = ContextRepository::AppFileRepository()->SearchAppFile($appCategory);

        return view("admin.App.file.index" , compact("nav" , "appCategories" , "appCategory" , "appFiles"));
    }




    public function create(){
        /// navigation page
        $nav = [
            "part"=> "بخش مدیریت برنامه ها",
            "navigation" =>[
                [
                    "route" => "admin.apps.file.index" ,
                    "current" => 0,
                    "title" => "لیست فایل برنامه ها"
                ],
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "افزودن فایل برنامه"
                ]
            ]
        ];

        $appCategories = ContextRepository::AppCategoryRepository()->getAllResult();

        return view("admin.App.file.create" , compact("nav" , "appCategories"));
    }

    public function store(AppFileRequest $request){
        $input = $request->all();

        if ($request->hasFile('file_app')){

            $resultUploadFile = $this->uploadFileApp(
                $request->file("file_app")
            );

            $input["address"] = $resultUploadFile["fileLocation"];
            $input["size"] = $resultUploadFile["fileSize"];
            $input["format"] = $resultUploadFile["fileFormat"];

            ContextRepository::AppFileRepository()->addResult($input);
            return $this ->redirectIndex("فایل جدید برنامه با موفقیت اضافه شد");
        }

        return $this ->redirectIndex("مشکلی در پردازش فایل ها رخ داده است" , true);
    }






    public function edit(AppFile $appFile){
        /// navigation page
        $nav = [
            "part"=> "بخش مدیریت برنامه ها",
            "navigation" =>[
                [
                    "route" => "admin.apps.category.index" ,
                    "current" => 0,
                    "title" => "لیست دسته بندی برنامه ها"
                ],
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "ویرایش دسته بندی"
                ]
            ]
        ];

        $appCategories = ContextRepository::AppCategoryRepository()->getAllResult();

        return view("admin.App.file.create" , compact("nav" , "appCategories",  "appFile"));
    }

    public function update(AppFileRequest $request, AppFile $appFile){
        $input = $request->all();

        if ($request->hasFile('file_app')){

            $resultUploadFile = $this->uploadFileApp(
                $request->file("file_app") ,
                $appFile->address
            );

            $input["address"] = $resultUploadFile["fileLocation"];
            $input["size"] = $resultUploadFile["fileSize"];
            $input["format"] = $resultUploadFile["fileFormat"];
        }

        ContextRepository::AppFileRepository()->updateResult($appFile , $input);
        return $this ->redirectIndex("فایل برنامه با موفقیت اصلاح شد");
    }





    public function destroy(AppFile $appFile){
        $address = $appFile->address;
        $filePath = public_path($address);
        if (file_exists($filePath)){
            unlink($filePath);
        }

        ContextRepository::AppFileRepository()->deleteResult($appFile);
        return $this ->redirectIndex("فایل برنامه با موفقیت حذف شد");
    }




    ////=================================================
    /// model
    /// =================================================
    private function uploadFileApp($fileApp , $lastFileApp=null){

        $resultUploadFile = $this->uploadFileServer(
            $fileApp ,
            "apps".DIRECTORY_SEPARATOR."files",
            $lastFileApp
        );

        /*if (isset($resultUploadFile["fileLocation"])){
            $resultUploadFile["fileLocation"] = ltrim( $resultUploadFile["fileLocation"] , "protect".DIRECTORY_SEPARATOR);
        }*/

        return $resultUploadFile;
    }
}
