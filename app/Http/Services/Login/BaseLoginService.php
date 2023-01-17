<?php

namespace App\Http\Services\Login;



use App\Repositories\ContextRepository;

class BaseLoginService{

    private $errors=[
        [
            "title" => "inValidInputRequest" ,
            "msg" =>  "شناسه ورودی شما، نه شماره موبایل می باشد و نه ایمیل"
        ],
        [
            "title" => "errorSendEmailOrSMS" ,
            "msg" =>  "مشکل در ارسال پیامک/ایمیل رخ داده است، لطفا دوباره تلاش نمایید"
        ],
        [
            "title" => "inValidLoginRequest" ,
            "msg" =>  "درخواست نا معتبر می باشد"
        ],
        [
            "title" => "inValidTokenRequest" ,
            "msg" =>  "کد نامعتبر می باشد"
        ],
        [
            "title" => "inValidResendTokenRequest" ,
            "msg" =>  "آدرس وارد شده نا معتبر است ..."
        ],
    ];


    protected $otpRepository;
    protected $userRepository;


    /// =============================================
    public function __construct()
    {
        $this->otpRepository = ContextRepository::OtpRepository();
        $this->userRepository = ContextRepository::UserRepository();
    }

    /// =============================================
    protected function checkValidatorEmail($inputLogin){
        if (filter_var($inputLogin,FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }

    protected function checkValidatorPhone($inputLogin){
        if(preg_match("/^(\+98|98|0)9\d{9}$/" , $inputLogin)){
            return true;
        }
        return false;
    }



    /// =============================================
    protected function getErrorInValidInputRequest(){
        return $this->getMsgError("inValidInputRequest");
    }

    protected function getErrorSendEmailOrSMS(){
        return $this->getMsgError("errorSendEmailOrSMS");
    }

    protected function getErrorInValidLoginRequest(){
        return $this->getMsgError("inValidLoginRequest");
    }

    protected function getErrorInValidTokenRequest(){
        return $this->getMsgError("inValidTokenRequest");
    }
    protected function getErrorInValidResendTokenRequest(){
        return $this->getMsgError("inValidResendTokenRequest");
    }

    /// =============================================
    private function getMsgError($keyError){
        foreach ($this->errors as $itemError){
            if ($keyError == $itemError["title"]){
                return $itemError;
            }
        }
        return null;
    }


}