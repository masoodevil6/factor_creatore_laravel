<?php
namespace App\Http\Controllers\PanelCustomer\Panels\PanelCustomer;

use App\Http\Controllers\PanelCustomer\Panels\InterfacePanelCustomer\IPanelMainCustomer;
use App\Http\Services\Login\LoginService;
use App\Http\Services\Login\VerifyInput;
use App\Http\Services\Messages\Email\Emails;
use App\Http\Services\Messages\SMS\SMSs;
use App\Http\Services\RedirectRoute\RedirectRouteService;
use App\Repositories\ContextRepository;

class PanelMainCustomer extends BasePanelCustomer implements IPanelMainCustomer {

    public function __construct()
    {
        $this->setTitleFa("حساب کاربر");
        $this->setTitleEn("personal-info");
        $this->setIcon("fa fa-user-circle-o");
    }


    public function returnPanelView()
    {
        $titleFa = $this->getTitleFa();
        $titleEn = $this->getTitleEn();
        $user = ContextRepository::UserRepository()->GetUserAuthInfo();
        return view("customer-panels.panels.panel-personal-info.index" , compact("titleFa" , "titleEn" ,  "user"))->render();

    }





    //// ================================================
    /// method function
    /// =================================================
    public function submitPersionalInfoClient($userName , $userFamily){

        if ( ContextRepository::UserRepository()->UpdateUserInfo($userName , $userFamily)){
            return redirect()->back()->with("alert-section-success" , "اطلاعات با موفقیت ویرایش شد");
        }

        return RedirectRouteService::setMsgResultText("مشکلی در پردازش اطلاعات رخ داده است")
            ->doRedirectRouteErrorResult()
            ->setRouteRedirect(route("home"))
            ->doRedirect();
    }




    //==============================
    // send
    //==============================

    public function sendVerifyCode($type , $input){
        $myInfo = "";
        if ($type == "phone"){
            $myInfo = checkPhoneGet($input);
        }
        else if ($type == "email"){
            $myInfo = checkEmailGet($input);
        }

        if ($myInfo != ""){
            return $this->sendOtpTokenClient($myInfo , ContextRepository::OtpRepository()->getTypeOtp($type));
        }
        return "";
    }


    protected function sendOtpTokenClient( $inputLogin , $type ){
        $verify = new  VerifyInput();
        return $verify->sendOtpTokenVerify($inputLogin , $type);
    }



    //==============================
    // verify
    //==============================
    public function verifyCodeGet($token , $code){
        $verify = new  VerifyInput();
        return $verify->verifyCodeGet($token , $code);
    }




}