<?php
namespace App\Repositories\InterFaceRepositories\Publics;

use App\Repositories\InterFaceRepositories\IBaseRepository;

interface IUnitRepository extends IBaseRepository {

    function SearchUnit($unitName="" , $numInPage=15);
}