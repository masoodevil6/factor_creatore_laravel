<?php
namespace App\Http\Services\Login;


class CheckLogin extends BaseLoginService{

    public function checkLastLogin($token , $inputLogin){
        $resultExp = [
            "inputLogin" => null ,
            "isValid" => false ,
            "status" => false ,
            "title" => "" ,
            "msg" => "" ,
        ];

        if (!$resultExp["isValid"]){
            $resultExp["isValid"] = $this->checkValidatorEmail($inputLogin);
        }
        if (!$resultExp["isValid"]){
            $resultExp["isValid"] = $this->checkValidatorPhone($inputLogin);
        }

        if ($resultExp["isValid"]){
            $opt = $this->otpRepository->checkLastLogin($token , $inputLogin);
            if (!empty($opt)){
                $resultExp["status"] = true;
                $resultExp["inputLogin"] = $inputLogin;
            }
        }
        else{
            $error = $this->getErrorInValidInputRequest();
            $resultExp["title"] = $error["title"];
            $resultExp["msg"] = $error["msg"];
        }

        return $resultExp;
    }


}