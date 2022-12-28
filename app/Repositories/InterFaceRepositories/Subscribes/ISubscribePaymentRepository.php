<?php
namespace App\Repositories\InterFaceRepositories\Subscribes;

use App\Repositories\InterFaceRepositories\IBaseRepository;

interface ISubscribePaymentRepository extends IBaseRepository {

    function CreateRecordForUser(string $userEmail ,  array $data) : int ;

}