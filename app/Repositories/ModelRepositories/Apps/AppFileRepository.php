<?php
namespace App\Repositories\ModelRepositories\Apps;

use App\Models\App\AppFile;
use App\Repositories\InterFaceRepositories\Apps\IAppFileRepository;
use App\Repositories\ModelRepositories\BaseRepository;


class AppFileRepository extends BaseRepository implements IAppFileRepository {

    public function __construct()
    {
        parent::__construct(new AppFile());
    }



    function SearchAppFile($appCategoryId = null , $numInPage=15)
    {
        if ($appCategoryId!=null){
            $this->model = $this->model->where('app_category_id' , $appCategoryId);
        }

        return $this->model->orderBy("id" , "desc")->paginate($numInPage);
    }
}