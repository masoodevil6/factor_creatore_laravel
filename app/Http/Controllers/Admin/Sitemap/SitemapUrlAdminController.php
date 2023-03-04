<?php

namespace App\Http\Controllers\Admin\Sitemap;

use App\Http\Controllers\Admin\MainAdminController;
use App\Http\Requests\Admin\Sitemap\SitemapFileRequest;
use App\Http\Requests\Admin\Sitemap\SitemapUrlRequest;
use App\Models\SiteMap\SitemapUrl;
use App\Repositories\ContextRepository;
use Illuminate\Http\Request;

class SitemapUrlAdminController extends MainAdminController
{
    function __construct()
    {
        parent::__construct(route("admin.sitemap.url.index"));
    }



    public function index(){
        $nav = [
            "part"=> "بخش مدیریت نقشه سایت",
            "navigation" =>[
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "لیست آدرس های نقشه سایت"
                ]
            ]
        ];

        $sitemapFileSearch = 0;
        if (isset($_GET["file"])){
            $sitemapFileSearch = $_GET["file"];
        }
        $sitemapFiles = ContextRepository::SitemapFileRepository()->getAllResult();
        $sitemapUrls = ContextRepository::SitemapUrlRepository()->searchUrlsInSitmapFile($sitemapFileSearch);


        return view("admin.sitemap.urls.index" , compact("nav" , "sitemapUrls" , "sitemapFiles" , "sitemapFileSearch"));
    }





    public function create(){
        /// navigation page
        $nav = [
            "part"=> "بخش مدیریت نقشه سایت",
            "navigation" =>[
                [
                    "route" => "admin.sitemap.url.index" ,
                    "current" => 1,
                    "title" => "لیست آدرس های نقشه سایت"
                ],
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "افزودن  آدرس های نقشه سایت"
                ]
            ]
        ];

        $sitemapFiles = ContextRepository::SitemapFileRepository()->getAllResult();
        $listPriorities = ContextRepository::SitemapUrlRepository()->getListSiteMapPriority();
        $listChangeFreqs = ContextRepository::SitemapUrlRepository()->getListSiteMapChangefreq();

        return view("admin.sitemap.urls.create" , compact("nav" , "sitemapFiles" , "listPriorities" , "listChangeFreqs"));
    }

    public function store(SitemapUrlRequest $request){
        $input = $request->all();
        ContextRepository::SitemapUrlRepository()->addResult($input);
        return $this ->redirectIndex("آدرس نقشه سایت جدید با موفقیت اضافه شد");
    }



    public function edit(SitemapUrl $sitemapUrl){
        /// navigation page
        $nav = [
            "part"=> "بخش مدیریت نقشه سایت",
            "navigation" =>[
                [
                    "route" => "admin.sitemap.url.index" ,
                    "current" => 1,
                    "title" => "لیست آدرس های نقشه سایت"
                ],
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "ویرایش آدرس نقشه سایت"
                ]
            ]
        ];

        $sitemapFiles = ContextRepository::SitemapFileRepository()->getAllResult();
        $listPriorities = ContextRepository::SitemapUrlRepository()->getListSiteMapPriority();
        $listChangeFreqs = ContextRepository::SitemapUrlRepository()->getListSiteMapChangefreq();

        return view("admin.sitemap.urls.create" , compact("nav" , "sitemapUrl" , "sitemapFiles" , "listPriorities" , "listChangeFreqs"));
    }

    public function update(SitemapUrlRequest $request, SitemapUrl $sitemapUrl){
        $input = $request->all();
        ContextRepository::SitemapUrlRepository()->updateResult($sitemapUrl , $input);
        return $this ->redirectIndex("آدرس نقشه سایت جدید با موفقیت اصلاح شد");
    }



    public function destroy(SitemapUrl $sitemapUrl){
        ContextRepository::SitemapUrlRepository()->deleteResult($sitemapUrl);
        return $this ->redirectIndex("آدرس نقشه سایت جدید با موفقیت حذف شد");
    }
}
