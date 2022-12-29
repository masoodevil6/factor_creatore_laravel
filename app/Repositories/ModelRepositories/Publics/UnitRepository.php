<?php
namespace App\Repositories\ModelRepositories\Publics;

use App\Models\Publics\Unit;
use App\Repositories\InterFaceRepositories\Publics\IUnitRepository;
use App\Repositories\ModelRepositories\BaseRepository;

class UnitRepository extends BaseRepository implements IUnitRepository {

    public function __construct()
    {
        parent::__construct(new Unit());
    }

    function SearchUnit($unitName = "", $numInPage = 15)
    {
        if ($unitName != ""){
            $this->model = $this->addSearcher("name" , $unitName);
        }

        return $this->model->simplePaginate($numInPage);
    }
}