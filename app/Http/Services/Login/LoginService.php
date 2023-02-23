<?php

namespace App\Http\Services\Login;

use App\Http\Services\Messages\Email\Emails;
use App\Http\Services\Messages\SMS\SMSs;
use App\Repositories\ContextRepository;
use Illuminate\Support\Facades\Hash;

class LoginService extends BaseLoginService{

    public function RegisterClientWithEmail($inputLogin){

        $resultExp = [
            "isValid" => false ,
            "token" => null ,
            "title" => "",
            "msg" => "",
        ];

        /// if input is email
        if ($resultExp["token"] == null){
            $resultExp = $this->checkInputIsEmail($inputLogin);
        }
        /// if input is phone
        if ($resultExp["token"] == null){
            $resultExp = $this->checkInputIsPhone($inputLogin);
        }

        //===============================
        $resultExp["title"] = "";
        $resultExp["msg"] = "";
        if (!$resultExp["isValid"]){
            $error = $this->getErrorInValidInputRequest();
            $resultExp["title"] = $error["title"];
            $resultExp["msg"] = $error["msg"];
        }
        else if ($resultExp["token"] == null){
            $error = $this->getErrorInValidInputRequest();
            $resultExp["title"] = $error["title"];
            $resultExp["msg"] = $error["msg"];
        }

        return $resultExp;
    }




    public function SendOtpTokenUserExist($inputLogin){

        $resultExp = [
            "isValid" => false ,
            "token" => null
        ];

        /// if input is email
        if ($resultExp["token"] == null){
            $resultExp = $this->checkInputIsEmail($inputLogin , false);
        }
        /// if input is phone
        if ($resultExp["token"] == null){
            $resultExp = $this->checkInputIsPhone($inputLogin , false);
        }

        return $resultExp;
    }



    public function ResendTokenToClient($token){

        $otp = $this->otpRepository->existOtpRequest($token , 0 , false);
        $resultExp = [
            "title" => "",
            "msg" => "",
            "newToken" => null,
        ];

        if (!empty($otp)){
            $resultExp["newToken"] = $this->sendOtpTokenClient($otp->user , $otp->input_login , $otp->type);
        }


        if ( $resultExp["newToken"] == null){
            $error = $this->getErrorInValidResendTokenRequest();
            $resultExp["title"] = $error["title"];
            $resultExp["msg"] = $error["msg"];
        }

        return $resultExp;
    }





    ///// =============================================

    private function checkInputIsEmail($inputLogin , $createUser=true){
        $resultExp = [
            "isValid" => false ,
            "token" => null ,
        ];
        if ($this->checkValidatorEmail($inputLogin)){
            $resultExp["isValid"] = true;
            $type = $this->otpRepository->getTypeOtp("email");
            $user = $this->userRepository->GetUserWithEmail($inputLogin);
            if (empty($user) && $createUser){
                $user = $this->createNewUser($inputLogin);
            }
            if ($user != null){
                $resultExp["token"] = $this->sendOtpTokenClient($user , $inputLogin , $type);
            }
        }
        return $resultExp;
    }

    private function checkInputIsPhone($inputLogin, $createUser=true){
        $resultExp = [
            "isValid" => false ,
            "token" => null ,
        ];
        if($this->checkValidatorPhone($inputLogin)){
            $resultExp["isValid"] = true;
            $type = $this->otpRepository->getTypeOtp("mobile");
            $inputLogin = filterPhoneNumber($inputLogin);
            $user = $this->userRepository->GetUserWithPhone($inputLogin);
            if (empty($user) && $createUser){
                $user = $this->createNewUser("" , $inputLogin);
            }
            if ($user != null){
                $resultExp["token"] = $this->sendOtpTokenClient($user , $inputLogin , $type);
            }
        }
        return $resultExp;
    }

    private function createNewUser($email=null , $mobile=null){
        if ($email != null || $mobile != null){
            $newUser["password"] = Hash::make("1234567890");
            $newUser["activation"] = 1;

            if ($email != null ){
                $newUser["email"] = $email;
            }
            else{
                $newUser["mobile"] = $mobile;
            }

            return $this->userRepository->addResult($newUser);
        }
        return null;
    }


    protected function sendOtpTokenClient($user , $inputLogin , $type ){

        $token = null;

        /// create token OTP
        $result = $this->otpRepository->createTokenOTP($user->id , $inputLogin , $type);

        /// send sms for user
        if ($type==0){
            $resultSendSms = (new SMSs())->sendTokenSmsForClientLogin($result["code"] , $inputLogin);
            if ($resultSendSms){
                $token = $result["token"];
            }
        }
        /// send email for user
        else if ($type == 1){
            $resultSendEmail = (new Emails())->sendTokenEmailForClientLogin($result["code"] , $inputLogin);
            if ($resultSendEmail){
                $token = $result["token"];
            }
        }

        return $token;


        /**/
    }

}