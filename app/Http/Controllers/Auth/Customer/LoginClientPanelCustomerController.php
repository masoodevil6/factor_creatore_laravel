<?php

namespace App\Http\Controllers\Auth\Customer;


use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Customer\LoginRegisterRequest;
use App\Http\Services\Messages\Email\EmailService;
use App\Http\Services\Messages\MessageService;
use App\Http\Services\Messages\SMS\SmsService;
use App\Http\Services\RedirectRoute\RedirectRouteService;
use App\Models\Otp;
use App\Models\User;
use App\Repositories\ContextRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginClientPanelCustomerController extends Controller
{

    private $otpRepository;
    private $userRepository;

    public function __construct()
    {
        $this->otpRepository = ContextRepository::OtpRepository();
        $this->userRepository = ContextRepository::UserRepository();
    }


    public function loginRegisterForm()
    {
        return view("customer.login.getEmailClient");
    }




    public function loginRegister(LoginRegisterRequest $request){

        $inputs = $request->all();


        /// if input is email
        if (filter_var($inputs["inputLogin"],FILTER_VALIDATE_EMAIL)){
            $type = $this->otpRepository->getTypeOtp("email");
            $user = $this->userRepository->GetUserWithEmail($inputs["inputLogin"]);
            if (empty($user)){
                $newUser["email"] = $inputs["inputLogin"];
            }
        }
        /// if input is phone
        else if(preg_match("/^(\+98|98|0)9\d{9}$/" , $inputs["inputLogin"])){
            $type = $this->otpRepository->getTypeOtp("mobile");
            $inputs["inputLogin"] = filterPhoneNumber($inputs["inputLogin"]);

            $user = $this->userRepository->GetUserWithPhone($inputs["inputLogin"]);
            if (empty($user)){
                $newUser["mobile"] = $inputs["inputLogin"];
            }
        }
        else{
            return RedirectRouteService::setMsgResultText("شناسه ورودی شما، نه شماره موبایل می باشد و نه ایمیل")
                ->doRedirectRouteErrorResult()
                ->setRouteRedirect(route("auth.customer.loginRegisterForm"))
                ->doRedirect();
        }

        if (empty($user)){
            $newUser["password"] = Hash::make("1234567890");
            $newUser["activation"] = 1;
            $user = $this->userRepository->addResult($newUser);
        }


        $token = $this->sendOtpTokenClient($user , $inputs["inputLogin"] , $type);


        if ($token != null){
            return redirect()->route("auth.customer.loginConfirmForm" , $token);
        }
        else{
            return RedirectRouteService::setMsgResultText("مشکل در ارسال پیامک/ایمیل رخ داده است، لطفا دوباره تلاش نمایید")
                ->doRedirectRouteErrorResult()
                ->setRouteRedirect(route("auth.customer.loginRegisterForm"))
                ->doRedirect();
        }

    }














    public function loginConfirmForm($token){

        $checkOtp = $this->checkOtpRequest($token);
        $otp = $checkOtp["otp"];
        $redirect = $checkOtp["redirect"];

        if ($redirect != null){
            return $redirect;
        }
        else if ($redirect == null && $otp != null){

            $maxTime = $this->otpRepository->getMaxTimeRequest();

            $now = Carbon::now()->timestamp;

            $timerDown = ($maxTime - $now)*1000;

            return view("customer.login.confirmClientLogin" , compact("token" , "otp" , "timerDown"));
        }

    }

    public function loginConfirm($token , LoginRegisterRequest $request){

        $checkOtp = $this->checkOtpRequest($token , $request->otp_code);
        $otp = $checkOtp["otp"];
        $redirect = $checkOtp["redirect"];

        if ($redirect != null){
            return $redirect;
        }
        else if ($redirect == null && $otp != null){

            $user = $otp->user;

            if ($otp->type == 0 && empty($user->mobile_verified_at)){
                $user -> mobile_verified_at = Carbon::now();
                $this->userRepository->save($user);
            }
            else if ($otp->type == 1 && empty($user->email_verified_at)){
                $user -> email_verified_at = Carbon::now();
                $this->userRepository->save($user);
            }

            Auth::login($user);

            return redirect()->route("home");

        }

    }




    public function resendToken($token){

        $otp = $this->otpRepository->existOtpRequest($token);

        $newToken = null;
        if (!empty($otp)){
            $newToken = $this->sendOtpTokenClient($otp->user , $otp->input_login , $otp->type);
        }

        if ($newToken != null){
            return redirect()->route("auth.customer.loginConfirmForm" , $newToken);
        }
        else{
            return RedirectRouteService::setMsgResultText("آدرس وارد شده نا معتبر است ...")
                ->doRedirectRouteErrorResult()
                ->setRouteRedirect(route("auth.customer.loginRegisterForm"))
                ->doRedirect();
        }

    }




    public function logout(){
        Auth::logout();
        return redirect()->route("home");
    }









    ///// =========================================================

    protected function sendOtpTokenClient($user , $inputLogin , $type ){

        $token = null;

        /// create token OTP
        $result = $this->otpRepository->createTokenOTP($user->id , $inputLogin , $type);

        /// send sms for user
        if ($type==0){
            $resultSendSms = $this -> sendTokenSmsForClient($result["code"] , $inputLogin);
            if ($resultSendSms){
                $token = $result["token"];
            }
        }
        /// send email for user
        else if ($type == 1){
            $resultSendEmail = $this -> sendTokenEmailForClient($result["code"] , $inputLogin);
            if ($resultSendEmail){
                $token = $result["token"];
            }
        }

        return $token;
    }


    protected function sendTokenSmsForClient($otp_Code , $userPhone){
        $smsText = "کاربر گرامی کد تایید شما:
\n
        ".$otp_Code;

        $smsService = new SmsService();
        $smsService->setFrom(Config::get("sms.otf_from"));
        $smsService->setTo(["0".$userPhone]);
        $smsService->setText($smsText);
        $smsService->setIsFlash(true);

        $messageService = new MessageService($smsService);
        return $messageService->send();
    }

    protected function sendTokenEmailForClient($otp_Code , $userEmail){

        $details = [
            "title" => "ایمیل فعال سازی" ,
            "body" => "کد فعال سازی شما: "." <b style='margin: 0 20px'>$otp_Code</b>"
        ];

        $emailService = new EmailService();
        $emailService->setDetails($details);
        $emailService->setFrom();
        $emailService->setSubject("کد اهراز هویت");
        $emailService->setTo($userEmail);

        $messageService = new MessageService($emailService);
        return $messageService->send();
    }




    protected function checkOtpRequest($token , $otpCode=""){

        $otp = $this->otpRepository->existOtpRequest($token);

        if ($otp != null ){

            if ($otpCode != ""){
                if ($otp->otp_code == $otpCode){
                    $otp->used = 1;
                    $this->otpRepository->save($otp);
                    return [
                        "otp" => $otp ,
                        "redirect" => null
                    ];
                }
                else{
                    return [
                        "otp" => null ,
                        "redirect" => RedirectRouteService::setMsgResultText("کد نامعتبر می باشد")
                            ->doRedirectRouteErrorResult()
                            ->setRouteRedirect(route("auth.customer.loginConfirmForm"))
                            ->doRedirect()
                    ];

                }
            }
            return [
                "otp" => $otp ,
                "redirect" => null
            ];
        }
        else{
            return [
                "otp" => null ,
                "redirect" => RedirectRouteService::setMsgResultText("درخواست نا معتبر می باشد")
                    ->doRedirectRouteErrorResult()
                    ->setRouteRedirect(route("auth.customer.loginRegisterForm"))
                    ->doRedirect()
            ];
        }

    }

}
