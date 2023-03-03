<?php
namespace App\Repositories\InterFaceRepositories\Seo;


use App\Repositories\InterFaceRepositories\IBaseRepository;

interface ISeoMetaRepository extends IBaseRepository {

    function refreshDataSeoMeta($pageId , $meta , $meta_id=0, $title , $description , $keywords , $robots);

}