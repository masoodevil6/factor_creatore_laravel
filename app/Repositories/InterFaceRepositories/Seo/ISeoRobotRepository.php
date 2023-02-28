<?php
namespace App\Repositories\InterFaceRepositories\Seo;


use App\Repositories\InterFaceRepositories\IBaseRepository;

interface ISeoRobotRepository extends IBaseRepository {

    function createItemSeoRobotIfNotExist(string  $title , string $description) : void;

}