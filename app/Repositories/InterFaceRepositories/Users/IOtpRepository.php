<?php
namespace App\Repositories\InterFaceRepositories\Users;


use App\Repositories\InterFaceRepositories\IBaseRepository;

interface IOtpRepository extends IBaseRepository {

    function createTokenOTP($userId , $inputLogin , $type , $checkStatus=false);

    function existOtpRequest($token , $userId=0);

    function getTypeOtp($typeTitle);

    function getTypeValueOtp($typeId);

    function getMaxTimeRequest();



}