<?php
namespace App\Repositories\InterFaceRepositories\Factors;

use App\Repositories\InterFaceRepositories\IBaseRepository;

interface IFactorRepository extends IBaseRepository {

    function GetUserFactors(int $userId);

    function SearchFactors(string $userName="" , $resNum="" , $numInPage=15);

}