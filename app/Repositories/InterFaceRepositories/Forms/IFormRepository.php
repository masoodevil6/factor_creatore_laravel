<?php
namespace App\Repositories\InterFaceRepositories\Forms;


use App\Repositories\InterFaceRepositories\IBaseRepository;

interface IFormRepository extends IBaseRepository {

    function SearchAllFormWithFilterSubscribe(int $subscribeId ,$numInPage = 15);

}