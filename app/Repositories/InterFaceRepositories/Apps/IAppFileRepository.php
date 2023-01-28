<?php
namespace App\Repositories\InterFaceRepositories\Apps;

use App\Repositories\InterFaceRepositories\IBaseRepository;

interface IAppFileRepository extends IBaseRepository {

    function SearchAppFile($appCategoryId=null, $numInPage=15);


}