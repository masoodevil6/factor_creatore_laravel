<?php

namespace App\Http\Controllers\Admin\Seo;

use App\Http\Controllers\Admin\MainAdminController;

use App\Http\Requests\Admin\Seo\SeoRobotRequest;
use App\Models\Seo\SeoRobot;
use App\Repositories\ContextRepository;
use Illuminate\Http\Request;

class SeoRobotAdminController extends MainAdminController
{

    function __construct()
    {
        parent::__construct(route("admin.seo.robot.index"));
    }



    public function index(){
        $nav = [
            "part"=> "بخش مدیریت ربات ها",
            "navigation" =>[
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "لیست ربات ها"
                ]
            ]
        ];

        $robots = ContextRepository::SeoRobotRepository()->getAllResult();

        return view("admin.Seo.robot.index" , compact("nav" , "robots" ));
    }





    public function create(){
        /// navigation page
        $nav = [
            "part"=> "بخش مدیریت ربات ها",
            "navigation" =>[
                [
                    "route" => "admin.seo.robot.index" ,
                    "current" => 1,
                    "title" => "لیست ربات ها"
                ],
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "افزودن ربات"
                ]
            ]
        ];

        return view("admin.Seo.robot.create" , compact("nav"));
    }

    public function store(SeoRobotRequest $request){
        $input = $request->all();
        ContextRepository::SeoRobotRepository()->addResult($input);
        return $this ->redirectIndex("ربات جدید با موفقیت اضافه شد");
    }





    public function edit(SeoRobot $seoRobot){
        /// navigation page
        $nav = [
            "part"=> "بخش مدیریت ربات ها",
            "navigation" =>[
                [
                    "route" => "admin.seo.robot.index" ,
                    "current" => 1,
                    "title" => "لیست ربات ها"
                ],
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "ویرایش ربات"
                ]
            ]
        ];

        return view("admin.Seo.robot.create" , compact("nav" , "seoRobot"));
    }

    public function update(SeoRobotRequest $request, SeoRobot $seoRobot){
        $input = $request->all();
        ContextRepository::SeoRobotRepository()->updateResult($seoRobot , $input);
        return $this ->redirectIndex("ربات با موفقیت اصلاح شد");
    }






    public function destroy(SeoRobot $seoRobot){
        ContextRepository::SeoRobotRepository()->deleteResult($seoRobot);
        return $this ->redirectIndex("ربات با موفقیت حذف شد");
    }


}
