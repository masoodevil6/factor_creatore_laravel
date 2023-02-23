<?php
namespace App\Repositories\ModelRepositories\Users;

use App\Models\Users\Otp;
use App\Repositories\InterFaceRepositories\Users\IOtpRepository;

use App\Repositories\ModelRepositories\BaseRepository;
use Carbon\Carbon;
use Illuminate\Support\Str;

class OtpRepository extends BaseRepository implements IOtpRepository {

    private $maxTimeRequest= 2;
    private $expireLoginWithTokenApi= 7;

    public function __construct()
    {
        parent::__construct(new Otp());
    }


    function createTokenOTP($userId, $inputLogin, $type, $checkStatus = false)
    {
        $otpCode = rand(111111 , 999999);
        $token = Str::random(60);
        $status = true;
        $otpInput = [
            "token" => $token ,
            "user_id" => $userId ,
            "otp_code" => $otpCode ,
            "input_login" => $inputLogin ,
            "type" => $type ,
        ];

        $lastToken = "";
        if ($checkStatus){
            $lastRequest =
                $this->model
                    ->where("user_id" , $userId)
                    ->where("created_at" , ">=" , Carbon::now()->subMinutes($this->maxTimeRequest)->toDateTimeString())
                    ->first();



            if (empty($lastRequest)){
                $status = true;
            }
            else{
                $lastToken = $lastRequest->token;
                $status = false;
            }
        }

        if ($status == true){
            $this->model->create($otpInput);
        }

        return [
            "code" => $otpCode ,
            "token" => $token ,
            "status" => $status ,
            "last_token" => $lastToken
        ];
    }




    function checkLastLogin($token, $inputLogin)
    {
        return $this->model
            ->where("used" , 1)
            ->where("status" , 1)
            ->where("token" , $token)
            ->where("input_login" , $inputLogin)
            ->where("created_at" , ">=" , Carbon::now()->subYears($this->expireLoginWithTokenApi)->toDateTimeString())
            ->first();
    }




    function UpdateUsedTokenOtp(Otp $otp) :bool
    {
        return $this->updateResult($otp ,
            [
                "used" => 1 ,
                "status"=> 1
            ]
        );
    }



    public function existOtpRequest($token, $userId = 0 , $checkTime=true)
    {
        $otp = $this->model
            ->where("token" , $token)
            ->where("used" , 0);

        if ($checkTime){
            $otp =$otp->where("created_at" , ">=" , Carbon::now()->subMinutes($this->maxTimeRequest)->toDateTimeString());
        }
        if ($userId > 0){
            $otp =$otp->where("user_id" , $userId);
        }
        $otp = $otp->first();

        return $otp;
    }


    public function getTypeOtp($typeTitle){
        foreach ($this->model->types As $value){
            if ($value["title"] == $typeTitle){
                return $value["type"];
            }
        }
        return false;
    }

    public function getTypeValueOtp($typeId){
        foreach ($this->model->types As $value){
            if ($value["type"] == $typeId){
                return $value["title"];
            }
        }
        return false;
    }

    function getMaxTimeRequest()
    {
        return $this->maxTimeRequest;
    }



}