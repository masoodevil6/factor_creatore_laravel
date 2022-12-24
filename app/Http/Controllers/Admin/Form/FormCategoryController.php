<?php

namespace App\Http\Controllers\Admin\Form;

use App\Http\Controllers\Admin\MainAdminController;
use App\Http\Requests\Admin\Forms\FormCategoryRequest;
use App\Models\Forms\FormCategory;
use App\Repositories\ContextRepository;
use Illuminate\Http\Request;

class FormCategoryController extends MainAdminController
{
    function __construct()
    {
        parent::__construct(route("admin.forms.form-category.index"));
    }

    public function index(){
        $nav = [
            "part"=> "بخش مدیریت دسته بندی فرم ها",
            "navigation" =>[
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "لیست دسته بندی فرم ها"
                ]
            ]
        ];

        $formCategories = ContextRepository::FormCategoryRepository()->getPaginateResult();

        return view("admin.forms.form-category.index" , compact("nav" , "formCategories"));
    }



    public function create(){
        /// navigation page
        $nav = [
            "part"=> "بخش مدیریت دسته بندی فرم ها",
            "navigation" =>[
                [
                    "route" => "admin.public.unit.index" ,
                    "current" => 0,
                    "title" => "لیست دسته بندی فرم ها"
                ],
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "افزودن دسته"
                ]
            ]
        ];

        return view("admin.forms.form-category.create" , compact("nav"));
    }

    public function store(FormCategoryRequest $request){
        $input = $request->all();
        ContextRepository::FormCategoryRepository()->addResult($input);
        return $this ->redirectIndex("دسته جدید با موفقیت اضافه شد");
    }




    public function edit(FormCategory $formCategory){
        /// navigation page
        $nav = [
            "part"=> "بخش مدیریت دسته بندی فرم ها",
            "navigation" =>[
                [
                    "route" => "admin.public.unit.index" ,
                    "current" => 0,
                    "title" => "لیست دسته بندی فرم ها"
                ],
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "ویرایش دسته"
                ]
            ]
        ];

        return view("admin.forms.form-category.create" , compact("nav" , "formCategory"));
    }

    public function update(FormCategoryRequest $request, FormCategory $formCategory){
        $input = $request->all();
        ContextRepository::FormCategoryRepository()->updateResult($formCategory , $input);
        return $this ->redirectIndex("دسته با موفقیت اصلاح شد");
    }



    public function destroy(FormCategory $formCategory){
        ContextRepository::FormCategoryRepository()->deleteResult($formCategory);
        return $this ->redirectIndex("دسته با موفقیت حذف شد");
    }


    public function status(FormCategory $formCategory){
        $result = ContextRepository::FormCategoryRepository()->changeStatusResult($formCategory);
        if ($result["status"]){
            return $result["exp"];
        }
    }

}
