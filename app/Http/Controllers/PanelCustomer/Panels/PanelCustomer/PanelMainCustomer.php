<?php
namespace App\Http\Controllers\PanelCustomer\Panels\PanelCustomer;

use App\Http\Controllers\PanelCustomer\Panels\InterfacePanelCustomer\IPanelMainCustomer;
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
    public function submitPersionalInfoClient($data){

        if ( ContextRepository::UserRepository()->UpdateUserInfo($data["name"] , $data["family"])){
            return redirect()->back()->with("alert-section-success" , "اطلاعات با موفقیت ویرایش شد");
        }

        return RedirectRouteService::setMsgResultText("مشکلی در پردازش اطلاعات رخ داده است")
            ->doRedirectRouteErrorResult()
            ->setRouteRedirect(route("home"))
            ->doRedirect();
    }




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








    //// ==========================
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









    //==============================
    // Model
    //==============================

    protected function sendOtpTokenClient( $inputLogin , $type ){
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

        return $resultExp;
    }



}