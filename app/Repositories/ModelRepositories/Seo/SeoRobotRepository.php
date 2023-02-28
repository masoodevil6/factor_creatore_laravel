<?php
namespace App\Repositories\ModelRepositories\Seo;

use App\Models\Seo\SeoRobot;
use App\Repositories\InterFaceRepositories\Seo\ISeoRobotRepository;
use App\Repositories\ModelRepositories\BaseRepository;

class SeoRobotRepository extends BaseRepository implements ISeoRobotRepository
{

    public function __construct()
    {
        parent::__construct(new SeoRobot());
    }


    function createItemSeoRobotIfNotExist(string $title, string $description): void
    {
        if (empty($this->model->where("title" , $title)->first())){

            $data = [
                "title" => $title,
                "description" => $description,
            ];

            $this->addResult($data);
        }
    }


}