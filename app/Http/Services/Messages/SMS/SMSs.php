<?php
namespace App\Http\Services\Messages\SMS;

use Illuminate\Support\Facades\Config;

class SMSs extends SmsService {


    public function sendTokenSmsForClientLogin($otp_Code , $userPhone){
        $smsText = "کاربر گرامی کد تایید شما:
\n
        ".$otp_Code;

        $this->setFrom(Config::get("sms.otf_from"));
        $this->setTo(["0".$userPhone]);
        $this->setText($smsText);
        $this->setIsFlash(true);

        return $this->fire();
    }


    public function sendVerifySmsForClientPhone($otp_Code , $userPhone){
        $smsText = "  کاربر گرامی کد اعتبار سنجی شما: \n".$otp_Code;

        $this->setFrom();
        $this->setTo(["0".$userPhone]);
        $this->setText($smsText);
        $this->setIsFlash(true);

        return $this->fire();
    }


}