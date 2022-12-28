<?php

namespace App\Http\Controllers\Admin\Form;

use App\Http\Controllers\Admin\MainAdminController;
use App\Http\Requests\Admin\Forms\FormFactorRequest;
use App\Models\Forms\Form;
use App\Repositories\ContextRepository;
use Illuminate\Support\Facades\Config;


class FormController extends MainAdminController
{

    function __construct()
    {
        parent::__construct(route("admin.forms.form.index") , true);
    }



    public function index(){
        $nav = [
            "part"=> "بخش مدیریت فرم ها",
            "navigation" =>[
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "لیست فرم ها"
                ]
            ]
        ];

        $subscribeId = 0;
        if (isset($_GET["subscribe"])){
            $subscribeId = $_GET["subscribe"];
        }
        $subscribes = ContextRepository::SubscribeRepository()->getAllResult();

        $forms= ContextRepository::FormRepository()->SearchAllFormWithFilterSubscribe($subscribeId);
        foreach ($forms as $key => $form){
            $forms[$key]["class_name"] = $this->getNameClass($form["class"]);
        }




        return view("admin.forms.forms.index" , compact("nav" ,"subscribeId"  , "subscribes" , "forms"));
    }




    public function create(){
        /// navigation page
        $nav = [
            "part"=> "بخش مدیریت فرم ها",
            "navigation" =>[
                [
                    "route" => "admin.forms.form.index" ,
                    "current" => 0,
                    "title" => "لیست فرم ها"
                ],
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "افزودن فرم"
                ]
            ]
        ];

        $formCategories = ContextRepository::FormCategoryRepository()->getAllResult();
        $classes = $this->getListFormClass();
        $subscribes = ContextRepository::SubscribeRepository()->getAllResult();

        return view("admin.forms.forms.create" , compact("nav" , "classes"  , "formCategories" , "subscribes"));
    }

    public function store(FormFactorRequest $request){
        $input = $request->all();
        $classNameSpace = $this->getNameSpaceClass($input["class_name"]);

        if (!empty($classNameSpace)){
            $input["class"] = $classNameSpace;

            if ($request->hasFile('image')){
                $input["image"] = $this->uploadImageForm($request->file('image'));
            }

            ContextRepository::FormRepository()->addResult($input);
            return $this ->redirectIndex("فرم جدید با موفقیت اضافه شد");
        }

        return $this ->redirectIndex("کلاس فرم موجود نمی باشد" , true);
    }




    public function edit(Form $form){
        /// navigation page
        $nav = [
            "part"=> "بخش مدیریت فرم ها",
            "navigation" =>[
                [
                    "route" => "admin.forms.form.index" ,
                    "current" => 0,
                    "title" => "لیست فرم ها"
                ],
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "ویرایش فرم"
                ]
            ]
        ];

        $formCategories = ContextRepository::FormCategoryRepository()->getAllResult();
        $classes = $this->getListFormClass();
        $subscribes = ContextRepository::SubscribeRepository()->getAllResult();

        return view("admin.forms.forms.create" , compact("nav" , "form" , "classes" , "formCategories" , "subscribes"));
    }

    public function update(FormFactorRequest $request, Form $form){
        $input = $request->all();
        $classNameSpace = $this->getNameSpaceClass($input["class_name"]);
        if (!empty($classNameSpace)){

            if ($request->hasFile('image')){
                $input["image"] = $this->uploadImageForm($request->file('image') , $form -> image);
            }

            $input["class"] = $classNameSpace;
            ContextRepository::FormRepository()->updateResult($form , $input);
            return $this ->redirectIndex("فرم با موفقیت اصلاح شد");
        }

        return $this ->redirectIndex("کلاس فرم موجود نمی باشد" , true);
    }



    public function destroy(Form $form){
        ContextRepository::FormRepository()->deleteResult($form);
        return $this ->redirectIndex("فرم با موفقیت حذف شد");
    }


    public function status(Form $form){
        $result = ContextRepository::FormRepository()->changeStatusResult($form);
        if ($result["status"]){
            return $result["exp"];
        }
    }




    //// =======================================================
    private function getNameSpaceClass($className){

        $forms = $this->getListFormClass();

        foreach ($forms as $form){
            if ($form["name"] == $className){
                return $form["namespace"];
            }
        }

        return null;
    }

    private function getNameClass($classNamespace){

        $forms = $this->getListFormClass();

        foreach ($forms as $form){
            if ($form["namespace"] == $classNamespace){
                return $form["name"];
            }
        }

        return null;
    }

    private function getListFormClass(){
        return Config::get("forms.form_class");
    }



    private function uploadImageForm($image , $lastImage=null){

        $resultUploadImage = $this->uploadImageServer(
            $image ,
            "images".DIRECTORY_SEPARATOR."form-images",
            $lastImage
        );

        return $resultUploadImage;
    }

}
