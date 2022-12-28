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


}