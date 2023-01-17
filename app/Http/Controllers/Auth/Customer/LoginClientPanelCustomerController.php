<?php

namespace App\Http\Controllers\Auth\Customer;


use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Customer\LoginInputRegisterRequest;
use App\Http\Requests\Auth\Customer\LoginOtpCodeRegisterRequest;
use App\Http\Services\Login\ConfirmLoginService;
use App\Http\Services\Login\LoginService;
use App\Http\Services\RedirectRoute\RedirectRouteService;
use App\Repositories\ContextRepository;
use Illuminate\Support\Facades\Auth;

class LoginClientPanelCustomerController extends Controller
{

    public function loginRegisterForm()
    {
        return view("customer.login.getEmailClient");
    }


    public function loginRegister(LoginInputRegisterRequest $request , LoginService $LoginService){

        $inputs = $request->all();
        $result = $LoginService->RegisterClientWithEmail($inputs["inputLogin"]);

        if (!$result["isValid"] && $result["title"]== "inValidInputRequest"){
            return RedirectRouteService::setMsgResultText($result["msg"])
                ->doRedirectRouteErrorResult()
                ->setRouteRedirect(route("auth.customer.loginRegisterForm"))
                ->doRedirect();
        }

        if ($result["token"] == null && $result["title"]== "errorSendEmailOrSMS"){
            return RedirectRouteService::setMsgResultText($result["msg"])
                ->doRedirectRouteErrorResult()
                ->setRouteRedirect(route("auth.customer.loginRegisterForm"))
                ->doRedirect();
        }

        return redirect()->route("auth.customer.loginConfirmForm" , $result["token"]);
    }


    public function loginConfirmForm($token , ConfirmLoginService $loginService){

        $result = $loginService->ReadyFormSendOtp($token);
        if ($result["isValid"]){
            $timerDown = $result["timerDown"];
            $otpType = $result["otpType"];
            $otpInputLogin = $result["otpInputLogin"];

            return view("customer.login.confirmClientLogin" , compact("token" , "otpType" , "otpInputLogin" , "timerDown"));
        }
        else{
            return RedirectRouteService::setMsgResultText($result["msg"])
                ->doRedirectRouteErrorResult()
                ->setRouteRedirect(route("auth.customer.loginRegisterForm"))
                ->doRedirect();
        }
    }





    public function loginConfirm($token , LoginOtpCodeRegisterRequest $request , ConfirmLoginService $confirmLoginService){
        $result = $confirmLoginService->ConfirmLoginClient($token , $request->otp_code);

        if ($result["isValid"] && $result["status"]){
            Auth::login($result["user"]);
            return redirect()->route("customer.home");
        }
        else{
            $title = $result["title"];
            $msg = $result["msg"];

            if ($title == "inValidLoginRequest"){
                return RedirectRouteService::setMsgResultText($msg)
                    ->doRedirectRouteErrorResult()
                    ->setRouteRedirect(route("auth.customer.loginRegisterForm"))
                    ->doRedirect();
            }
            else if ($title == "inValidTokenRequest"){
                return RedirectRouteService::setMsgResultText($msg)
                    ->doRedirectRouteErrorResult()
                    ->setRouteRedirect(route("auth.customer.loginConfirmForm" , $token))
                    ->doRedirect();
            }
        }
    }




    public function resendToken($token , LoginService $loginService){

        $result = $loginService->ResendTokenToClient($token);

        $newToken = $result["newToken"];

        if ($newToken == null && $result["title"] == "inValidResendTokenRequest"){
            return RedirectRouteService::setMsgResultText($result["msg"])
                ->doRedirectRouteErrorResult()
                ->setRouteRedirect(route("auth.customer.loginRegisterForm"))
                ->doRedirect();
        }

        return redirect()->route("auth.customer.loginConfirmForm" , $newToken);
    }




    public function logout(){
        ContextRepository::UserRepository()->LogoutAuthUser();
        ContextRepository::AdminUserRepository()->LogoutAuthAdminPanel();
        return redirect()->route("customer.home");
    }




}
