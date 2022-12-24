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

        $AdminUsers = $this->getAllUserAdmin();

        return view("admin.admin.user-admin.index" , compact("nav" , "AdminUsers"));
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

    private function getAllUserAdmin(){

        $admins = ContextRepository::AdminRepository()->getAllResult();

        $resultExp = [];
        foreach ($admins As $itemAdmin){
            foreach ($itemAdmin->users As $itemUser){
                $result=[
                    "admin_id"=>$itemAdmin->id,
                    "admin_title"=>$itemAdmin->title,
                    "user_id"=> $itemUser->id,
                    "user_email"=> $itemUser->email,
                    "user_name"=> $itemUser ->fullName,
                    "status"=> $itemUser ->pivot->status,
                ];

                array_push($resultExp , $result);
            }
        }

        return $resultExp;
    }
}
