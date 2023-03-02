<?php
namespace App\Repositories\ModelRepositories\Seo;

use App\Models\Seo\SeoMeta;
use App\Repositories\ContextRepository;
use App\Repositories\InterFaceRepositories\Seo\ISeoMetaRepository;
use App\Repositories\ModelRepositories\BaseRepository;

class SeoMetaRepository extends BaseRepository implements ISeoMetaRepository
{

    public function __construct()
    {
        parent::__construct(new SeoMeta());
    }


    function refreshDataSeoMeta($pageId , $meta , $title , $description , $keywords , $robots)
    {
        if ($pageId > 0){
            $MetaSeo = null;
            if (!empty($meta) && $meta!=null){
                $MetaSeo = $this->model->where("id" , $meta->id)->where("seo_page_id" , $pageId)->first();
            }

            $data = [
                "title" => $title ,
                "description" => $description
            ];

            if (!empty($MetaSeo) || $MetaSeo != null){
                $this->updateResult($MetaSeo , $data);
            }
            else{
                $data["seo_page_id"] = $pageId;
                $MetaSeo = $this->addResult($data);
            }

            ContextRepository::SeoKeywordRepository()->refreshDataSeoKeyword($MetaSeo->id , $keywords);

            //dd($MetaSeo);
            $MetaSeo->robots()->sync($robots);

            return $MetaSeo;
        }

        return null;
    }
}