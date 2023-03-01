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
}