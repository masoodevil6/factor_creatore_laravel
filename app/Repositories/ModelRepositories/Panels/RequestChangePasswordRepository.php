<?php
namespace App\Repositories\ModelRepositories\Panels;

use App\Models\Panel\RequestChangePassword;
use App\Repositories\InterFaceRepositories\Panels\IRequestChangePasswordRepository;
use App\Repositories\ModelRepositories\BaseRepository;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RequestChangePasswordRepository extends BaseRepository implements IRequestChangePasswordRepository {

    private $expireRequestTokenMinute = 30;


    public function __construct()
    {
        parent::__construct(new RequestChangePassword());
    }


    function CheckExistLastRequest($userEmail)
    {
        $existRequest = $this->model->where("user_email" , $userEmail )->first();
        if (empty($existRequest) || (!empty($existRequest) && Carbon::parse($existRequest-> created_at)->addMinutes($this->expireRequestTokenMinute) < Carbon::now())){
            return true;
        }
        return false;
    }


    function CreateRequestToken($userEmail , $password)
    {
        $token =  Str::random(35);
        $this->addResult([
            "user_email" => $userEmail ,
            "user_password" => Hash::make($password) ,
            "token" => $token,
            "active" => 1
        ]);
        return $token;
    }


    function CheckValidRequestToken(string $token)
    {
        $requestChangePassword = $this->model->where("token" , $token)->first();
        if ($requestChangePassword->active == 1 && Carbon::parse($requestChangePassword-> created_at)->addMinutes($this->expireRequestTokenMinute) >= Carbon::now()){
            return $requestChangePassword;
        }
        return null;
    }
}