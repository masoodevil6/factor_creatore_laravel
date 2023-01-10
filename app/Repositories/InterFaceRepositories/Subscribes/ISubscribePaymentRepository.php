<?php
namespace App\Repositories\InterFaceRepositories\Subscribes;

use App\Repositories\InterFaceRepositories\IBaseRepository;

interface ISubscribePaymentRepository extends IBaseRepository {

    function CreateRecordForUser(string $userEmail ,  array $data) : int ;

    function SearchSubscribePayment(string $userName="", string $resNum="" , int $Status=-1, int $subscribe=0 , $numInPage=15);




    function GetAllSubscribeAuthUser($numInPage=15);

    function GetInfoSubscribeAuthUser($subscribeId);

    function DeleteSubscribeAuthUser($subscribeId);




    function GetSubscribeActiveNow();
    function GetSubscribeActiveNowWithTimeStamp();
}