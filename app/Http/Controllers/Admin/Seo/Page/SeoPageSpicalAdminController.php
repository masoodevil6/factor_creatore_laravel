<?php

namespace App\Http\Controllers\Admin\Seo\Page;

use App\Http\Controllers\Admin\MainAdminController;
use App\Models\Seo\SeoPage;
use App\Repositories\ContextRepository;
use Illuminate\Http\Request;

class SeoPageSpicalAdminController extends MainAdminController
{

    function __construct()
    {
        parent::__construct(route("admin.seo.pages.spical.index"));
    }



    public function index(){
        $nav = [
            "part"=> "بخش مدیریت سئو صفحات ثابت",
            "navigation" =>[
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "لیست صفحات ثابت"
                ]
            ]
        ];

        $pages = ContextRepository::SeoPageRepository()->getListSpicalPages();

        return view("admin.Seo.page.spical.index" , compact("nav" , "pages" ));
    }





    public function info(SeoPage $seoPage){
        /// navigation page
        $nav = [
            "part"=> "بخش مدیریت سئو صفحات ثابت",
            "navigation" =>[
                [
                    "route" => "admin.seo.pages.spical.index" ,
                    "current" => 1,
                    "title" => "لیست صفحات ثابت"
                ],
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "سئو صفحه"
                ]
            ]
        ];

        $robots = ContextRepository::SeoRobotRepository()->getAllResult();

        return view("admin.Seo.page.spical.info" , compact("nav" , "robots" , "seoPage"));
    }




    public function store(Request $request){
        dd($request);
    }



}
