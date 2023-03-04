<?php

namespace App\Http\Controllers\Admin\Sitemap;

use App\Http\Controllers\Admin\MainAdminController;
use App\Http\Requests\Admin\Sitemap\SitemapFileRequest;
use App\Models\SiteMap\SitemapFile;
use App\Repositories\ContextRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SitemapFileAdminController extends MainAdminController
{
    function __construct()
    {
        parent::__construct(route("admin.sitemap.file.index"));
    }



    public function index(){
        $nav = [
            "part"=> "بخش مدیریت نقشه سایت",
            "navigation" =>[
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "لیست فایل های نقشه سایت"
                ]
            ]
        ];

        $sitemapFiles = ContextRepository::SitemapFileRepository()->getAllResult();

        return view("admin.sitemap.files.index" , compact("nav" , "sitemapFiles" ));
    }





    public function create(){
        /// navigation page
        $nav = [
            "part"=> "بخش مدیریت نقشه سایت",
            "navigation" =>[
                [
                    "route" => "admin.sitemap.file.index" ,
                    "current" => 1,
                    "title" => "لیست فایل های نقشه سایت"
                ],
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "افزودن  فایل های نقشه سایت"
                ]
            ]
        ];

        return view("admin.sitemap.files.create" , compact("nav"));
    }

    public function store(SitemapFileRequest $request){
        $input = $request->all();
        $input["title_en"] = convertStandardTextUrl($input["title_en"]);
        ContextRepository::SitemapFileRepository()->addResult($input);
        return $this ->redirectIndex("فایل نقشه سایت جدید با موفقیت اضافه شد");
    }



    public function edit(SitemapFile $sitemapFile){
        /// navigation page
        $nav = [
            "part"=> "بخش مدیریت نقشه سایت",
            "navigation" =>[
                [
                    "route" => "admin.sitemap.file.index" ,
                    "current" => 1,
                    "title" => "لیست فایل های نقشه سایت"
                ],
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "ویرایش فایل نقشه سایت"
                ]
            ]
        ];

        return view("admin.sitemap.files.create" , compact("nav" , "sitemapFile"));
    }

    public function update(SitemapFileRequest $request, SitemapFile $sitemapFile){
        $input = $request->all();
        $input["title_en"] = convertStandardTextUrl($input["title_en"]);
        ContextRepository::SitemapFileRepository()->updateResult($sitemapFile , $input);
        return $this ->redirectIndex("فایل نقشه سایت جدید با موفقیت اصلاح شد");
    }



    public function destroy(SitemapFile $sitemapFile){
        ContextRepository::SitemapFileRepository()->deleteResult($sitemapFile);
        return $this ->redirectIndex("فایل نقشه سایت جدید با موفقیت حذف شد");
    }

}
