<?php
namespace App\Http\Services\Login;


use App\Http\Services\Messages\Email\Emails;
use App\Http\Services\Messages\SMS\SMSs;
use App\Repositories\ContextRepository;

class VerifyInput
{


    public function sendOtpTokenVerify( $inputLogin , $type ){

        $resultExp = "";

        $result = ContextRepository::OtpRepository()->createTokenOTP(ContextRepository::UserRepository()->GetUserAuthId() , $inputLogin , $type , true);
        
        if ($result["status"]){
            $otpType = ContextRepository::OtpRepository()->getTypeValueOtp($type);
            $resultSend = "";

            if ($otpType=="phone"){
                $resultSend = (new SMSs())-> sendVerifySmsForClientPhone($result["code"] , $inputLogin);
            }
            else if ($otpType == "email"){
                $resultSend = (new Emails())-> sendVerifyEmailForClientEmail($result["code"] , $inputLogin);
            }

            if ($resultSend){
                $resultExp = $result["token"];
            }
        }
        else{
            $resultExp = $result["last_token"];
        }

        return $resultExp;

    }


    public function verifyCodeGet($token , $code){
        $otp = ContextRepository::OtpRepository()->existOtpRequest($token , ContextRepository::UserRepository()->GetUserAuthId());
        if (!empty($otp)){
            $originalCode = $otp->otp_code;
            $used = $otp->used;
            if ($originalCode == $code && $used == 0){
                return ContextRepository::UserRepository()->UpdateUserEmailOrPhone($otp);
            }
        }
        return false;
    }


}