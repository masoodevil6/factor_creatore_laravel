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
     * string => inputLogin
     * ====================================
     * "isValid" => false
     * "status" => false
     * "title" => ""
     * "msg" => ""
     */
    public function checkTokenAndEmail(LoginInputRegisterRequest $request , CheckLogin $checkLogin){
        $token = $request->bearerToken();
        return $checkLogin->checkLastLogin($token , $request->inputLogin);
    }





    /*
     * ====================================
     *  url=> /login/register
     *====================================
     * string => inputLogin
     * ====================================
     * "isValid" => false
     * "token" => null
     * "title" => ""
     * "msg" => ""
     */
    public function registerEmailOrPhoneClient(LoginInputRegisterRequest $request, LoginService $LoginService){
        return $LoginService->RegisterClientWithEmail($request->inputLogin);
    }




    /*
     * ====================================
     *  url=> /login/confirm-login
     * ====================================
     * header-bearer => token
     * int => otp_code
     * ====================================
     * "isValid" => false
     * "status" => false
     * "user" => null
     * "title" => ""
     * "msg" => ""
     */
    public function ConfirmLoginClient(LoginOtpCodeRegisterRequest $request ,ConfirmLoginService $confirmLoginService){
        $token = $request->bearerToken();
        return  $confirmLoginService->ConfirmLoginClient($token , $request->otp_code);
    }




    /*
     * ====================================
     *  url=> /login/ready-and-validator-token
     * ====================================
     * header-bearer => token
     * ====================================
     * "isValid" => false
     * "timerDown" => 0
     * "otpType" => null
     * "otpInputLogin" => null
     * "msg" => ""
     * "title" => ""
     */
    public function ReadyAndValidatorRequestToken(Request $request,ConfirmLoginService $confirmLoginService){
        $token = $request->bearerToken();
        return $confirmLoginService->ReadyFormSendOtp($token);
    }



    /*
     * ====================================
     *  url=> /login/resend-otp-token
     * ====================================
     * header-bearer => token
     * ====================================
     * "title" => ""
     * "msg" => ""
     * "newToken" => ""
     */
    public function ResendMessageTokenClient(Request $request , LoginService $loginService){
        $token = $request->bearerToken();
        return $loginService->ResendTokenToClient($token);
    }

}
