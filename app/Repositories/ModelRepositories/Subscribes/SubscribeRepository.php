<?php
namespace App\Repositories\ModelRepositories\Subscribes;

use App\Models\Subscribes\Subscribe;
use App\Repositories\InterFaceRepositories\Subscribes\ISubscribeRepository;
use App\Repositories\ModelRepositories\BaseRepository;


class SubscribeRepository extends BaseRepository implements ISubscribeRepository {

    public function __construct()
    {
        parent::__construct(new Subscribe());
    }


    function SearchSubscribe(string $subscribeName = "", $numInPage = 15)
    {
        if ($subscribeName != ""){
            $this->model = $this->addSearcher('title' , $subscribeName);
        }
        return $this->model->simplePaginate($numInPage);
    }
}