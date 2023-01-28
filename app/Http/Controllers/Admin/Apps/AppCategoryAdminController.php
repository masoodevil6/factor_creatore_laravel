<?php

namespace App\Http\Controllers\Admin\Apps;

use App\Http\Controllers\Admin\MainAdminController;
use App\Http\Requests\Admin\App\AppCategoryRequest;
use App\Models\App\AppCategory;
use App\Repositories\ContextRepository;
use Illuminate\Http\Request;

class AppCategoryAdminController extends MainAdminController
{
    function __construct()
    {
        parent::__construct(route("admin.apps.category.index"));
    }


    public function index(){
        $nav = [
            "part"=> "بخش مدیریت برنامه ها",
            "navigation" =>[
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "لیست دسته بندی برنامه ها"
                ]
            ]
        ];

        $appCategories = ContextRepository::AppCategoryRepository()->getAllResult();

        return view("admin.App.Category.index" , compact("nav" , "appCategories" ));
    }




    public function create(){
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
                    "title" => "افزودن دسته بندی"
                ]
            ]
        ];

        return view("admin.App.Category.create" , compact("nav"));
    }

    public function store(AppCategoryRequest $request){
        $input = $request->all();
        ContextRepository::AppCategoryRepository()->addResult($input);
        return $this ->redirectIndex("دسته بندی جدید با موفقیت اضافه شد");
    }




    public function edit(AppCategory $appCategory){
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

        return view("admin.App.Category.create" , compact("nav" , "appCategory"));
    }

    public function update(AppCategoryRequest $request, AppCategory $appCategory){
        $input = $request->all();
        ContextRepository::AppCategoryRepository()->updateResult($appCategory , $input);
        return $this ->redirectIndex("دسته بندی با موفقیت اصلاح شد");
    }



    public function destroy(AppCategory $appCategory){
        ContextRepository::AppCategoryRepository()->deleteResult($appCategory);
        return $this ->redirectIndex("دسته بندی با موفقیت حذف شد");
    }


}
