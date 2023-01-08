<?php
namespace App\Repositories\InterFaceRepositories\Factors;

use App\Repositories\InterFaceRepositories\IBaseRepository;

interface IFactorRepository extends IBaseRepository {

    function GetStandardPassPrice();

    function GetUserFactors(int $userId);

    function SearchFactors(string $userName="" , $resNum="" , $numInPage=15);



    function GetFactorAuthAuthUser($numInPage = 15);

    function GetInfoSelectedFactorAuthUser($resNum);

    function DeleteSelectedFactorAuthUser($resNum);



    function GenerateUniqueResNumFactor();

}