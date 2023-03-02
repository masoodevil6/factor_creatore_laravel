<?php

namespace App\Http\Controllers\Admin\Seo\Page;

use App\Http\Controllers\Admin\MainAdminController;
use App\Models\Seo\SeoPage;
use App\Repositories\ContextRepository;
use Illuminate\Http\Request;
use function Ramsey\Uuid\Lazy\equals;

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
                    "current" => 0,
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




    public function store(Request $request , SeoPage $seoPage){

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

        if (!empty($seoPage)){
            ContextRepository::SeoMetaRepository()->refreshDataSeoMeta($seoPage->id , $seoPage->meta , $title , $description , $keywords , $robots);
            return $this ->redirectIndex("اطلاعات با موفقیت ثبت شد");
        }

        return $this->redirectIndex("صقحه موجود یافت نشد" , true );
    }



}
