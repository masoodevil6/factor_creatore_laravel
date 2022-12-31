<?php
namespace App\Repositories\ModelRepositories\Users;

use App\Models\Users\Otp;
use App\Models\Users\User;
use App\Repositories\ContextRepository;
use App\Repositories\InterFaceRepositories\Users\IUserRepository;
use App\Repositories\ModelRepositories\BaseRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository implements IUserRepository {

    public function __construct()
    {
        parent::__construct(new User());
    }

    function GetUserWithEmail(string $userEmail)
    {
        return $this->model->where("email" , $userEmail)->first();
    }

    function GetUserWithPhone(string $userPhone)
    {
        return $this->model->where("mobile" , $userPhone)->first();
    }

    function UpdateUserInfo(string $userName, string $userFamily) :bool
    {
        $user = $this->GetUserAuthInfo();
        if (!empty($user)){
            return $this->updateResult($user , [
                "name" => $userName ,
                "family" => $userFamily ,
            ]);
        }
        return false;
    }


    function UpdateUserEmailOrPhone(Otp $otp): bool
    {
        if ($this->GetUserAuthId() == $otp->user_id){
            $type = $otp->type;
            $input = $otp->input_login;
            $user = $this->GetUserAuthInfo();

            if ($type == 0){
                $data = ["mobile" => $input];
            }
            else if ($type == 1){
                $data = ["email" => $input];
            }

            ContextRepository::OtpRepository()->UpdateUsedTokenOtp($otp);
            $this->updateResult($user , $data);

            return true;
        }
        return false;
    }





    function SyncPanelUserAdmin(string  $user_email , int $adminId , int $AdminStatus , string $adminPassword="fa1401")
    {
        $user = $this->GetUserWithEmail($user_email);
        $user->admins()->sync(
            [
                $adminId =>[
                    "status"=> $AdminStatus ,
                    "password" => Hash::make($adminPassword)
                ]
            ]
        );
    }

    function UpdatePanelUserAdmin(User $user , int $adminId , int $AdminStatus)
    {
        $user->admins()->updateExistingPivot($user->admins->get(0) , [ "admin_id" => $adminId , "status"=> $AdminStatus]);
    }

    function DetachAllPanelUserAdmin(int $userId)
    {
        $user = $this->getResult($userId);
        $this->DetachPanelUserAdmin($user);
    }

    function DetachPanelUserAdmin(User $user)
    {
        $user->admins()->detach();
    }





    function SearchUser(string $userName = "" , $numInPage=15)
    {
        if ($userName != ""){
            $this->model = $this->addSearcher("CONCAT(`name`, ' ', `family`)" , $userName);
        }

        return $this->model->paginate($numInPage);
    }






    function GetUserAuthInfo()
    {
        return Auth::user();
    }

    function GetUserAuthId()
    {
        return Auth::id();
    }



    function GetUserPanelAuthAdminInfo($user)
    {
        return $user->admins()->first();
    }

    function GetUserPasswordAuthPanelAdmin($panel)
    {
        return $panel->pivot->password;
    }


    function LogoutAuthUser()
    {
        if (Auth::check()){
            Auth::logout();
        }
    }





}