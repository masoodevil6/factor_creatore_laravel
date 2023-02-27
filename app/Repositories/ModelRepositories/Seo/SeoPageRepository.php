<?php
namespace App\Repositories\ModelRepositories\Seo;

use App\Models\Seo\SeoPage;
use App\Repositories\InterFaceRepositories\Seo\ISeoPageRepository;
use App\Repositories\ModelRepositories\BaseRepository;

class SeoPageRepository extends BaseRepository implements ISeoPageRepository
{

    public function __construct()
    {
        parent::__construct(new SeoPage());
    }


}