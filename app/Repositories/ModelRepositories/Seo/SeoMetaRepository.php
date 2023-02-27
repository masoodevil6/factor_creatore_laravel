<?php
namespace App\Repositories\ModelRepositories\Seo;

use App\Models\Seo\SeoMeta;
use App\Repositories\InterFaceRepositories\Seo\ISeoMetaRepository;
use App\Repositories\ModelRepositories\BaseRepository;

class SeoMetaRepository extends BaseRepository implements ISeoMetaRepository
{

    public function __construct()
    {
        parent::__construct(new SeoMeta());
    }


}