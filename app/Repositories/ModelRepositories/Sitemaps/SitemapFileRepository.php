<?php
namespace App\Repositories\ModelRepositories\Sitemaps;

use App\Models\SiteMap\SitemapFile;
use App\Repositories\InterFaceRepositories\Sitemaps\ISitemapFileRepository;
use App\Repositories\ModelRepositories\BaseRepository;

class SitemapFileRepository extends BaseRepository implements ISitemapFileRepository {

    public function __construct()
    {
        parent::__construct(new SitemapFile());
    }

}