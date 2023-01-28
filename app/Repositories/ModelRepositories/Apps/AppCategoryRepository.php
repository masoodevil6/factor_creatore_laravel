<?php
namespace App\Repositories\ModelRepositories\Apps;

use App\Models\App\AppCategory;
use App\Repositories\InterFaceRepositories\Apps\IAppCategoryRepository;
use App\Repositories\ModelRepositories\BaseRepository;


class AppCategoryRepository extends BaseRepository implements IAppCategoryRepository {

    public function __construct()
    {
        parent::__construct(new AppCategory());
    }


}