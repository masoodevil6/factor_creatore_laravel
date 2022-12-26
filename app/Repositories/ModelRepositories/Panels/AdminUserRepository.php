<?php
namespace App\Repositories\ModelRepositories\Panels;

use App\Models\Panel\AdminUser;
use App\Repositories\InterFaceRepositories\Panels\IAdminUserRepository;
use App\Repositories\ModelRepositories\BaseRepository;
use Illuminate\Support\Facades\Auth;
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
}