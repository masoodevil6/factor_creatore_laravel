<?php

namespace App\Http\Controllers\Admin\Seo\Page;

use App\Http\Controllers\Admin\MainAdminController;
use App\Models\Subscribes\Subscribe;
use App\Repositories\ContextRepository;
use Illuminate\Http\Request;

class SeoPageSeoSubscribesAdminController extends MainAdminController
{

    function __construct()
    {
        parent::__construct(route("admin.seo.pages.subscribes.index"));
    }



    public function index(){
        $nav = [
            "part"=> "بخش مدیریت سئو صفحات اشتراک ها",
            "navigation" =>[
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "لیست صفحات اشتراک ها"
                ]
            ]
        ];

        $subscribes = ContextRepository::SubscribeRepository()->getListSeoPagesSubscirbe();
        return view("admin.Seo.page.subscribes.index" , compact("nav" , "subscribes" ));
    }


    public function info($slug){

        $subscribe = ContextRepository::SubscribeRepository()->GetInfoSubscribe($slug);
        if (!empty($subscribe)){
            /// navigation page
            $nav = [
                "part"=> "بخش مدیریت سئو صفحات اشتراک ها",
                "navigation" =>[
                    [
                        "route" => "admin.seo.pages.spical.index" ,
                        "current" => 0,
                        "title" => "لیست صفحات اشتراک ها"
                    ],
                    [
                        "route" => "" ,
                        "current" => 1,
                        "title" => "سئو صفحه اشتراک"
                    ]
                ]
            ];

            $robots = ContextRepository::SeoRobotRepository()->getAllResult();

            return view("admin.Seo.page.subscribes.info" , compact("nav" , "robots" , "subscribe"));
        }

        return $this->redirectIndex("اشتراک یافت نشد!!!" , true );

    }



    public function store(Request $request , $slug){
        $subscribe = ContextRepository::SubscribeRepository()->GetInfoSubscribe($slug);
        if (!empty($subscribe)){

            $title="";
            if ($request->has("title")){
                $title = $request ->get("title");
            }
            $description="";
            if ($request->has("description")){
                $description = $request ->get("description");
            }
            $keywords=[];
            if ($request->has("keywords")){
                $keywords = $request ->get("keywords");
            }
            $robots=[];
            if ($request->has("robots")){
                foreach ($request->get("robots") As $itemRobot){
                    $robotId = ContextRepository::SeoRobotRepository()->getIdRobotFromTitle($itemRobot);
                    if ($robotId > 0 ){
                        array_push($robots , $robotId );
                    }
                }
            }


            ContextRepository::SeoMetaRepository()->refreshDataSeoMeta(
                ContextRepository::SeoPageRepository()->getIdSubscribeSeo() ,
                $subscribe->meta ,
                $subscribe -> id ,
                $title ,
                $description ,
                $keywords ,
                $robots);

            return $this ->redirectIndex("اطلاعات با موفقیت ثبت شد");

        }

        return $this->redirectIndex("اشتراک یافت نشد!!!" , true );



    }



}
