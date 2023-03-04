<?php
namespace App\Repositories\InterFaceRepositories\Sitemaps;

use App\Repositories\InterFaceRepositories\IBaseRepository;

interface ISitemapFileRepository extends IBaseRepository {

    function getSitemapUrlsInSitemapFile($sitemapFile);

}