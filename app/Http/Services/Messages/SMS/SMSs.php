<?php
namespace App\Http\Services\Messages\SMS;

class SMSs extends SmsService {

    public function sendVerifySmsForClientPhone($otp_Code , $userPhone){
        $smsText = "  کاربر گرامی کد اعتبار سنجی شما: \n".$otp_Code;

        $this->setFrom();
        $this->setTo(["0".$userPhone]);
        $this->setText($smsText);
        $this->setIsFlash(true);

        return $this->fire();
    }


}