<?php
namespace App\Repositories\InterFaceRepositories\Seo;


use App\Repositories\InterFaceRepositories\IBaseRepository;

interface ISeoMetaRepository extends IBaseRepository {


    function refreshDataSeoMeta($pageId , $meta , $title , $description , $keywords , $robots);

}