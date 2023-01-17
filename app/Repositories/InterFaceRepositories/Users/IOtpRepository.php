<?php
namespace App\Repositories\InterFaceRepositories\Users;


use App\Models\Users\Otp;
use App\Repositories\InterFaceRepositories\IBaseRepository;

interface IOtpRepository extends IBaseRepository {

    function createTokenOTP($userId , $inputLogin , $type , $checkStatus=false);

    function checkLastLogin($token , $inputLogin);

    function existOtpRequest($token , $userId=0 , $checkTime=true);

    function getTypeOtp($typeTitle);

    function getTypeValueOtp($typeId);

    function getMaxTimeRequest();

    function UpdateUsedTokenOtp(Otp $otp) :bool ;


}