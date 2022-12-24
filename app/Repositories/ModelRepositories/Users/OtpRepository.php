<?php
namespace App\Repositories\ModelRepositories\Users;

use App\Models\Users\Otp;
use App\Repositories\InterFaceRepositories\Users\IOtpRepository;

use App\Repositories\ModelRepositories\BaseRepository;
use Carbon\Carbon;
use Illuminate\Support\Str;

class OtpRepository extends BaseRepository implements IOtpRepository {

    private $maxTimeRequest= 5;

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

        if ($checkStatus){
            $lastRequest =
                $this->model
                    ->where("user_id" , $userId)
                    ->where("created_at" , ">=" , Carbon::now()->subMinutes($this->maxTimeRequest)
                    ->toDateTimeString())->first();
            if (empty($lastRequest)){
                $status = true;
            }
            else{
                $status = false;
            }
        }

        if ($status == true){
            $this->model->create($otpInput);
        }

        return [
            "code" => $otpCode ,
            "token" => $token ,
            "status" => $status
        ];
    }



    public function existOtpRequest($token, $userId = 0)
    {
        $otp = $this->model
            ->where("token" , $token)
            ->where("used" , 0)
            ->where("created_at" , ">=" , Carbon::now()->subMinutes($this->maxTimeRequest)->toDateTimeString());
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