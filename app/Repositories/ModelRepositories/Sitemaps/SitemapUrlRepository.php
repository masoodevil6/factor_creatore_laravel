<?php
namespace App\Repositories\ModelRepositories\Sitemaps;

use App\Models\SiteMap\SitemapUrl;
use App\Repositories\InterFaceRepositories\Sitemaps\ISitemapUrlRepository;
use App\Repositories\ModelRepositories\BaseRepository;

class SitemapUrlRepository extends BaseRepository implements ISitemapUrlRepository {

    public function __construct()
    {
        parent::__construct(new SitemapUrl());
    }


    function getListSiteMapChangefreq()
    {

        return [
            [
                "changefreq_title_en" => "" ,
                "changefreq_title_fa" => "[پیش فرض]" ,
            ],
            [
                "changefreq_title_en" => "always" ,
                "changefreq_title_fa" => "همیشه" ,
            ],
            [
                "changefreq_title_en" => "hourly" ,
                "changefreq_title_fa" => "هر ساعت" ,
            ],
            [
                "changefreq_title_en" => "daily" ,
                "changefreq_title_fa" => "روزانه" ,
            ],
            [
                "changefreq_title_en" => "weekly" ,
                "changefreq_title_fa" => "هفتگی" ,
            ],
            [
                "changefreq_title_en" => "monthly",
                "changefreq_title_fa" => "ماهانه" ,
            ],
            [
                "changefreq_title_en" => "yearly",
                "changefreq_title_fa" => "سالانه" ,
            ],
            [
                "changefreq_title_en" => "never" ,
                "changefreq_title_fa" => "هرگز"
            ]
        ];

    }


    function getListSiteMapPriority()
    {
        $resultExp = [
            [
                "priority_title_en" => "" ,
                "priority_title_fa" => "[پیش فرض]" ,
            ],
        ];

        for ($i=1 ; $i<=100 ; $i++){
            $res = [
                "priority_title_en" => $i/100 ,
                "priority_title_fa" => $i ,
            ];
            array_push($resultExp , $res);
        }

        return $resultExp;
    }


    function searchUrlsInSitmapFile($sitemapFileId=0 ,  $numInPage = 15)
    {
        if ($sitemapFileId > 0){
            return $this->model->where("sitemap_file_id" , $sitemapFileId)->paginate($numInPage);
        }
        else{
            return $this->model->paginate($numInPage);
        }
    }
}