<?php
namespace App\Repositories\InterFaceRepositories\Subscribes;

use App\Repositories\InterFaceRepositories\IBaseRepository;

interface ISubscribeRepository extends IBaseRepository {

    function SearchSubscribe(string $subscribeName="" , $numInPage=15);

}