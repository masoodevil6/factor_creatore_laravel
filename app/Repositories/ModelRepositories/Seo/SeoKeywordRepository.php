<?php
namespace App\Repositories\ModelRepositories\Seo;

use App\Models\Seo\SeoKeyword;
use App\Repositories\InterFaceRepositories\Seo\ISeoKeywordRepository;
use App\Repositories\ModelRepositories\BaseRepository;

class SeoKeywordRepository extends BaseRepository implements ISeoKeywordRepository
{

    public function __construct()
    {
        parent::__construct(new SeoKeyword());
    }


}