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


    function refreshDataSeoMeta($pageId ,  $meta , $meta_id=0, $title , $description , $keywords , $robots)
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
                $data["meta_id"] = $meta_id;
                $MetaSeo = $this->addResult($data);
            }

            ContextRepository::SeoKeywordRepository()->refreshDataSeoKeyword($MetaSeo->id , $keywords);

            $MetaSeo->robots()->sync($robots);

            return $MetaSeo;
        }

        return null;
    }


    function getDataSeoMeta($meta)
    {
        $dataSeo = [
            "title" => "" ,
            "description" => "" ,
            "keywords" => "" ,
            "robots" => ""
        ];

        if (!empty($meta)){
            $dataSeo["title"] = $meta->title;
            $dataSeo["description"] = $meta->description;
        }

        $metaKeywords = "";
        if (isset($meta->keywords)){
            foreach ($meta->keywords as $key => $itemKeyword){
                $metaKeywords .= $itemKeyword->title;
                if ($key < sizeof($meta->keywords)-1){
                    $metaKeywords .= ",";
                }
            }
        }
        $dataSeo["keywords"] = $metaKeywords;

        $metaRobots="";
        if (isset($meta->robots)){
            foreach ($meta->robots as $key => $itemRobot){
                $metaRobots .= $itemRobot->title;
                if ($key < sizeof($meta->robots)-1){
                    $metaRobots .= ",";
                }
            }
        }
        $dataSeo["robots"] = $metaRobots;

        return $dataSeo;
    }
}