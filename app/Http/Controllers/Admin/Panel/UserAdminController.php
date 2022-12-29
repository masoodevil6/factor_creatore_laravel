<?php

namespace App\Http\Controllers\Admin\Panel;

use App\Http\Controllers\Admin\MainAdminController;

use App\Http\Requests\Admin\Admin\UserAdminRequest;
use App\Models\Users\User;
use App\Repositories\ContextRepository;


class UserAdminController extends MainAdminController
{

    function __construct()
    {
        parent::__construct(route("admin.panel.user-admin.index") );
    }



    public function index()
    {
        $nav = [
            "part"=> "بخش مدیریت کاربران",
            "navigation" =>[
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "لیست ادمین ها "
                ]
            ]
        ];

        $userSearch = "";
        if (isset($_GET["user"])){
            $userSearch = $_GET["user"];
        }
        $userEmailSearch = "";
        if (isset($_GET["email"])){
            $userEmailSearch = $_GET["email"];
        }
        $panelSearcher = 0;
        if (isset($_GET["panel"])){
            $panelSearcher = $_GET["panel"];
        }

        $panels = ContextRepository::AdminRepository()->getAllResult();
        $AdminUsers = $this->getAllUserAdmin($userSearch , $userEmailSearch , $panelSearcher);

        return view("admin.admin.user-admin.index" ,
            compact("nav" , "AdminUsers" , "panels" ,
                "userSearch" , "userEmailSearch" , "panelSearcher")
        );
    }



    public function create()
    {
        /// navigation page
        $nav = [
            "part"=> "بخش مدیریت کاربران",
            "navigation" =>[
                [
                    "route" => "admin.panel.user-admin.index" ,
                    "current" => 0,
                    "title" => "لیست ادمین ها"
                ],
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "افرودن ادمین"
                ]
            ]
        ];

        $admins = ContextRepository::AdminRepository()->getAllResult();

        return view("admin.admin.user-admin.create" , compact("nav" , "admins"));
    }


    public function store(UserAdminRequest $request)
    {
        $inputs = $request->all();

        ContextRepository::UserRepository()->SyncPanelUserAdmin($inputs["user_email"] , $inputs["admin_id"] , $inputs["status"]);

        return $this ->redirectIndex("موقعیت پنل کاربر مورد نظر با موفقیت تعییر یافت");
    }




    public function edit(User $user)
    {
        /// navigation page
        $nav = [
            "part"=> "بخش مدیریت کاربران",
            "navigation" =>[
                [
                    "route" => "admin.panel.user-admin.index" ,
                    "current" => 0,
                    "title" => "لیست ادمین ها"
                ],
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "افرودن ادمین"
                ]
            ]
        ];

        $admins = ContextRepository::AdminRepository()->getAllResult();

        return view("admin.admin.user-admin.create" , compact("nav" , "admins" , "user"));
    }


    public function update(UserAdminRequest $request, User $user)
    {
        $inputs = $request->all();

        ContextRepository::UserRepository()->UpdatePanelUserAdmin($user , $inputs["admin_id"] , $inputs["status"] );

        return $this ->redirectIndex("موقعیت پنل کاربر مورد نظر با موفقیت تعییر یافت");
    }






    public function destroy(User $user)
    {
        ContextRepository::UserRepository()->DetachPanelUserAdmin($user);

        return $this ->redirectIndex("کاربر مورد نظر از لیست ادیمن ها، با موفقیت حذف شد");
    }




    public function status(User $user){

        $admin = $user->admins;
        $lastStatus = null;
        if (!empty($admin)){
            $lastStatus = $admin->get(0)->pivot->status;
        }

        if (in_array($lastStatus, [0 , 1])){

            $status = $lastStatus == 0 ? 1 : 0;
            $user->admins()->updateExistingPivot($admin->get(0) , ["status"=> $status]);

            return $this->resultJsonChangeStatus(true , $status , false , "status" , $status);
        }

        return false;
    }





    //// ==============================================
    /// Model
    /// ===============================================

    private function getAllUserAdmin($userSearch ="" , $userEmailSearch="" , $panelSearcher = 0){

        $admins = ContextRepository::AdminUserRepository()->SearchAdminUser($userSearch , $userEmailSearch , $panelSearcher);

        $resultExp = [];
        foreach ($admins As $itemAdmin){
            $result=[
                "admin_id"=>$itemAdmin->id,
                "admin_title"=>$itemAdmin->title,
                "user_id"=> $itemAdmin->user_id,
                "user_email"=> $itemAdmin->email,
                "user_name"=> $itemAdmin ->name." ".$itemAdmin ->family,
                "status"=> $itemAdmin->status,
            ];

            array_push($resultExp , $result);
        }

        return $resultExp;
    }
}
