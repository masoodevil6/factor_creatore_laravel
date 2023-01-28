<?php
namespace App\Repositories\InterFaceRepositories\Apps;

use App\Repositories\InterFaceRepositories\IBaseRepository;

interface IAppFileLinkRepository extends IBaseRepository {

    public function SearchAppFileLink($appCategoryId=null, $appFileId=null , $numInPage=15);


    public function GetListAppFileLink();

}