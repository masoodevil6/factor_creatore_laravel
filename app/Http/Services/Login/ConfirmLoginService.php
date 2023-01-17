<?php

namespace App\Http\Services\Login;

use Carbon\Carbon;

class ConfirmLoginService extends BaseLoginService{

    public function ReadyFormSendOtp($token){

        $resultExp= [
            "isValid" => false,
            "timerDown" => 0,
            "otpType" => null ,
            "otpInputLogin" => null ,
            "title" => "" ,
            "msg" => "" ,
        ];

        $resultCheckOtp = $this->checkOtpRequest($token);

        if ($resultCheckOtp["isValid"]){
            $resultExp["isValid"] = $resultCheckOtp["isValid"];
            $resultExp["otpType"] = $resultCheckOtp["otpType"];
            $resultExp["otpInputLogin"] = $resultCheckOtp["otpInputLogin"];
            $resultExp["title"] = "";
            $resultExp["msg"] = "";

            $maxTime = (new \Carbon\Carbon($resultCheckOtp["otpCreatedAt"]))->addMinutes($this->otpRepository->getMaxTimeRequest())->timestamp;

            $now = Carbon::now()->timestamp;

            $resultExp["timerDown"] = ($maxTime - $now)*1000;
        }

        return $resultExp;
    }

    public function ConfirmLoginClient($token , $otpCode){

        $resultCheckOtp = $this->checkOtpRequest($token , $otpCode);

        $resultExp= [
            "isValid" => $resultCheckOtp["isValid"],
            "status" => false,
            "user" => null ,
            "title" => $resultCheckOtp["title"] ,
            "msg" =>  $resultCheckOtp["msg"] ,
        ];

        if ($resultCheckOtp["isValid"] && $resultCheckOtp["status"] && !empty($resultCheckOtp["user"])){
            $resultExp["status"] = $resultCheckOtp["status"];
            $resultExp["user"] = $resultCheckOtp["user"];


            $user = $resultCheckOtp["user"];
            $otpType = $resultCheckOtp["otpType"];

            if ($otpType == 0 && empty($user->mobile_verified_at)){
                $user -> mobile_verified_at = Carbon::now();
                $this->userRepository->save($user);
            }
            else if ($otpType== 1 && empty($user->email_verified_at)){
                $user -> email_verified_at = Carbon::now();
                $this->userRepository->save($user);
            }
        }

        return $resultExp;
    }


    ///// ==============================================

    protected function checkOtpRequest($token="" , $otpCode=""){

        $resultExp= [
            "isValid" => false,
            "status" => false,

            "title" => "",
            "msg" => "",

            "otpType" => null ,
            "otpInputLogin" => null ,
            "otpCreatedAt" => null ,

            "user" => null ,
        ];

        //===============
        $error = $this->getErrorInValidLoginRequest();
        $resultExp["title"] = $error["title"];
        $resultExp["msg"] = $error["msg"];

        if (!empty($token)){
            $otp = $this->otpRepository->existOtpRequest($token);

            if ($otp != null ){
                $resultExp["isValid"] = true;
                //===============
                $resultExp["otpType"] = $otp->type;
                $resultExp["otpInputLogin"] = $otp->input_login;
                $resultExp["otpCreatedAt"] = $otp->created_at;
                //===============
                $error = $this->getErrorInValidTokenRequest();
                $resultExp["title"] = $error["title"];
                $resultExp["msg"] = $error["msg"];


                if ($otpCode != "" && $otp->otp_code == $otpCode){
                    $this->otpRepository->UpdateUsedTokenOtp($otp);
                    //===============
                    $resultExp["status"] = true;
                    $resultExp["user"] = $otp->user;
                    //===============
                    $resultExp["title"] = "";
                    $resultExp["msg"] = "";
                }
            }
        }

        return $resultExp;
    }

}