<?php
namespace App\Http\Services\Messages\Email;



class Emails extends EmailService {

    public function sendVerifyEmailForClientEmail($otp_Code , $userEmail){

        $details = [
            "title" => "کد اعتبار سنجی ایمیل" ,
            "body" => "کد تایید: "." <b style='margin: 0 20px'>$otp_Code</b>"
        ];

        $this->setDetails($details);
        $this->setFrom();
        $this->setSubject("کد اعتبار سنجی");
        $this->setTo($userEmail);

        return $this->fire();
    }

}