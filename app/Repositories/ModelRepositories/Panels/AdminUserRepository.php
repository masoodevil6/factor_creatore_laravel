<?php
namespace App\Repositories\ModelRepositories\Panels;

use App\Models\Panel\AdminUser;
use App\Repositories\InterFaceRepositories\Panels\IAdminUserRepository;
use App\Repositories\ModelRepositories\BaseRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserRepository extends BaseRepository implements IAdminUserRepository {

    public function __construct()
    {
        parent::__construct(new AdminUser());
    }


    function getLoginClientToPanelAdmin()
    {
        return $this->model
            ->select("admins.id")
            ->where("admin_user.user_id" , Auth::id())
            ->join("admins" , "admin_user.admin_id" , "=" , "admins.id")
            ->first();
    }



    function LoginUserAdmin(int $id)
    {
        $panelClass = $this->model->where("user_id" , $id)->first();
        Auth::guard("admin")->login($panelClass);
    }


    function GetUserAdminAuth(){
        return Auth::guard("admin")->user();
    }

    function GetUserIdAdminAuth(){
        return Auth::guard("admin")->id();
    }


    function GetPanelUserAdminAuth($adminUser)
    {
        return $adminUser->admin;
    }


    function GetEmailAdminAuth($password)
    {
        $adminPanel = $this->GetUserAdminAuth();
        if (Hash::check($password , $adminPanel->password)){

            return $adminPanel->user -> email;
        }
        return null;
    }


    function SearchAdminUser($userName = "", $userEmail = "", $panelSearcher = 0, $numInPage = 15)
    {
        if ($userName != "" && $userEmail != ""){
            $this->model = $this->model->join('users', function($join) use ($userName , $userEmail){
                $join->on('admin_user.user_id', "=", 'users.id');
                $join->where(function ($where) use ($userName) {
                    $where
                        ->where(DB::raw("CONCAT(users.`name`, ' ', users.`family`)")  , "like" , $userName."%")
                        ->orWhere(DB::raw("CONCAT(users.`name`, ' ', users.`family`)")  , "like" , "%".$userName)
                        ->orWhere(DB::raw("CONCAT(users.`name`, ' ', users.`family`)")  , "like" , "%".$userName."%")
                        ->orWhere(DB::raw("CONCAT(users.`name`, ' ', users.`family`)")  , "like" , $userName);
                });
                $join->where(function ($where) use ($userEmail) {
                    $where
                        ->where("users.email"  , "like" , $userEmail."%")
                        ->orWhere("users.email"  , "like" , "%".$userEmail)
                        ->orWhere("users.email"  , "like" , "%".$userEmail."%")
                        ->orWhere("users.email" , "like" , $userEmail);
                });
            });
        }
        else if ($userName != ""){
            $this->model = $this->model->join('users', function($join) use ($userName){
                $join->on('admin_user.user_id', "=", 'users.id');
                $join
                    ->where(DB::raw("CONCAT(users.`name`, ' ', users.`family`)")  , "like" , $userName."%")
                    ->orWhere(DB::raw("CONCAT(users.`name`, ' ', users.`family`)")  , "like" , "%".$userName)
                    ->orWhere(DB::raw("CONCAT(users.`name`, ' ', users.`family`)")  , "like" , "%".$userName."%")
                    ->orWhere(DB::raw("CONCAT(users.`name`, ' ', users.`family`)")  , "like" , $userName);

            });
        }
        else if ($userEmail != ""){
            $this->model = $this->model->join('users', function($join) use ($userEmail){
                $join->on('admin_user.user_id', "=", 'users.id');
                $join
                    ->where("users.email"  , "like" , $userEmail."%")
                    ->orWhere("users.email"  , "like" , "%".$userEmail)
                    ->orWhere("users.email"  , "like" , "%".$userEmail."%")
                    ->orWhere("users.email"  , "like" , $userEmail);
            });
        }
        else{
            $this->model = $this->model->join('users','admin_user.user_id', "=", 'users.id');
        }

        $this->model = $this->model->join('admins','admin_user.admin_id', "=", 'admins.id');

        if ($panelSearcher > 0){
            $this->model = $this->model->where("admin_id" , $panelSearcher);
        }

        return $this->model->simplePaginate($numInPage);
    }
}