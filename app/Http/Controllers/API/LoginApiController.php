<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Customer\LoginInputRegisterRequest;
use App\Http\Requests\Auth\Customer\LoginOtpCodeRegisterRequest;
use App\Http\Services\Login\CheckLogin;
use App\Http\Services\Login\ConfirmLoginService;
use App\Http\Services\Login\LoginService;
use Illuminate\Http\Request;

class LoginApiController extends Controller
{



    /*
     * ====================================
     *  url=> /login/check-last-login
     *====================================
     * header-bearer => token
     * header => string => inputLogin
     * ====================================
     * "inputLogin" => null
     * "isValid" => false
     * "status" => false
     * "title" => ""
     * "msg" => ""
     */
    public function checkTokenAndEmail(Request $request , CheckLogin $checkLogin){
        $token = $request->bearerToken();
        $inputLogin = $request->header("inputLogin");
        return $checkLogin->checkLastLogin($token , $inputLogin);
    }





    /*
     * ====================================
     *  url=> /login/register
     *====================================
     * post => inputLogin
     * ====================================
     * "isValid" => false
     * "inputLogin" => null
     * "token" => null
     * "title" => ""
     * "msg" => ""
     * "timerDown" => 0
     * "otpType" => null
     */
    public function registerEmailOrPhoneClient(Request $request, LoginService $LoginService){

        $resultExp = [
            "isValid" => false ,

            "token" => null ,
            "inputLogin" => null ,

            "title" => "",
            "msg" => "",

            "timerDown" => 0,
            "otpType" => 0 ,
        ];

        $resultStep = $LoginService->RegisterClientWithEmail($request->inputLogin);
        $resultExp["token"] = $resultStep["token"];
        $resultExp["title"] = $resultStep["title"];
        $resultExp["msg"] = $resultStep["msg"];

        if($resultStep["isValid"] && !empty($resultStep["token"])){
            $infoRequest = $this->ReadyAndValidatorRequestToken($resultExp["token"]);
            if ($infoRequest["isValid"]){
                $resultExp["isValid"] = $infoRequest["isValid"];
                $resultExp["inputLogin"] = $infoRequest["inputLogin"];
                $resultExp["otpType"] = $infoRequest["otpType"];
                $resultExp["timerDown"] = $infoRequest["timerDown"];
                $resultExp["title"] = $infoRequest["title"];
                $resultExp["msg"] = $infoRequest["msg"];
            }
        }

        return $resultExp;
    }



    /*
     * ====================================
     *  url=> /login/resend-otp-token
     * ====================================
     * header-bearer => token
     * ====================================
     * "isValid" => false
     * "inputLogin" => null
     * "token" => null
     * "title" => ""
     * "msg" => ""
     * "timerDown" => 0
     * "otpType" => null
     */
    public function ResendMessageTokenClient(Request $request , LoginService $loginService){

        $resultExp = [
            "isValid" => false ,

            "token" => null ,
            "inputLogin" => null ,

            "title" => "",
            "msg" => "",

            "timerDown" => 0,
            "otpType" => null ,
        ];


        $token = $request->bearerToken();
        $resultStep = $loginService->ResendTokenToClient($token);
        $resultExp["token"] = $resultStep["newToken"];
        $resultExp["title"] = $resultStep["title"];
        $resultExp["msg"] = $resultStep["msg"];

        if($resultExp["token"] != null){
            $infoRequest = $this->ReadyAndValidatorRequestToken($resultExp["token"]);
            if ($infoRequest["isValid"]){
                $resultExp["isValid"] = $infoRequest["isValid"];
                $resultExp["inputLogin"] = $infoRequest["inputLogin"];
                $resultExp["otpType"] = $infoRequest["otpType"];
                $resultExp["timerDown"] = $infoRequest["timerDown"];
                $resultExp["title"] = $infoRequest["title"];
                $resultExp["msg"] = $infoRequest["msg"];
            }
        }

        return $resultExp;
    }



    /*
     * ====================================
     *  url=> /login/confirm-login
     * ====================================
     * header-bearer => token
     * int => otp_code
     * ====================================
     * "inputLogin" => null
     * "isValid" => false
     * "status" => false
     * "user" => null
     * "title" => ""
     * "msg" => ""
     */
    public function ConfirmLoginClient(Request $request ,ConfirmLoginService $confirmLoginService){
        $token = $request->bearerToken();
        return  $confirmLoginService->ConfirmLoginClient($token , $request->otp_code);
    }






    /////==============================================================

    /*
     * "isValid" => false,
     * "timerDown" => 0,
     * "otpType" => null ,
     * "inputLogin" => null ,
     * "title" => "" ,
     * "msg" => "" ,*/
    private function ReadyAndValidatorRequestToken($token){
        $confirmLoginService = new ConfirmLoginService();
        return $confirmLoginService->ReadyFormSendOtp($token);
    }



}
