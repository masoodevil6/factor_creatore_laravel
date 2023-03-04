<?php
namespace App\Repositories\InterFaceRepositories\Sitemaps;

use App\Repositories\InterFaceRepositories\IBaseRepository;

interface ISitemapUrlRepository extends IBaseRepository {

    function getListSiteMapChangefreq();

    function getListSiteMapPriority();

    function searchUrlsInSitmapFile($sitemapFileId=0 ,  $numInPage = 15);
}