<?php
namespace App\Repositories\ModelRepositories\Seo;

use App\Models\Seo\SeoPage;
use App\Repositories\ContextRepository;
use App\Repositories\InterFaceRepositories\Seo\ISeoPageRepository;
use App\Repositories\ModelRepositories\BaseRepository;

class SeoPageRepository extends BaseRepository implements ISeoPageRepository
{

    private $titleSpicalHome = "home";
    private $titleSpicalAboutUs = "aboutUs";
    private $titleSpicalDownloadApps = "downloadApps";
    private $titleSpicalListSubscribes = "listSubscribes";
    private $titleSubscribes = "subscribe";

    public function __construct()
    {
        parent::__construct(new SeoPage());
    }


    function createItemSeoPageIfNotExist(string $pageName, bool $spical): void
    {
        if (empty($this->model->where("title" , $pageName)->first())){

            $isSpical = 0;
            if ($spical){
                $isSpical = 1;
            }

            $data = [
                "title" => $pageName,
                "spical" => $isSpical,
            ];

            $this->addResult($data);
        }
    }


    function getListSpicalPages()
    {
        return $this->model->where("spical" , 1)->get();
    }









    function getIdSubscribeSeo()
    {
        $seoPage = $this->model
            ->where("title" , $this->getTitleSubscribesSeo())
            ->where("spical" , 0)
            ->first();
        if (!empty($seoPage)){
            return $seoPage->id;
        }
        return null;
    }

    function getTitleSubscribesSeo()
    {
        return $this->titleSubscribes;
    }





    function getMetaSeoSpicalHome()
    {
        return $this->getMetaSeoSpical($this->titleSpicalHome);
    }

    function getMetaSeoSpicalAboutUs()
    {
        return $this->getMetaSeoSpical($this->titleSpicalAboutUs);
    }

    function getMetaSeoSpicalDownloadApps()
    {
        return $this->getMetaSeoSpical($this->titleSpicalDownloadApps);
    }

    function getMetaSeoSpicalListSubscribes()
    {
        return $this->getMetaSeoSpical($this->titleSpicalListSubscribes);
    }






    /////========================================
    private function getMetaSeoSpical($titlePage){
        $dataSeo = [
            "title" => "" ,
            "description" => "" ,
            "keywords" => "" ,
            "robots" => ""
        ];

        $seoPage = $this->model
            ->where("title" , $titlePage)
            ->where("spical" , 1)
            ->with(["meta"])
            ->first();
        if (!empty($seoPage)){

            $data = $seoPage->meta()->with(["keywords" , "robots"])->first();

            $dataSeo = ContextRepository::SeoMetaRepository()->getDataSeoMeta($data);

        }
        return $dataSeo;
    }
}