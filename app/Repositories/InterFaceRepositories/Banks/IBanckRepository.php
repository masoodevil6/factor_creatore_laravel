<?php
namespace App\Repositories\InterFaceRepositories\Banks;

use App\Repositories\InterFaceRepositories\IBaseRepository;

interface IBanckRepository extends IBaseRepository {

    function SearchBank(string $bankName="" ,$numInPage = 15);

}