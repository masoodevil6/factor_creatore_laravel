<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Admin\MainAdminController;
use App\Http\Requests\Admin\User\UserRequest;
use App\Models\Users\User;
use App\Repositories\ContextRepository;
use Illuminate\Http\Request;

class UserController extends MainAdminController
{
    function __construct()
    {
        parent::__construct(route("admin.users.user.index") );
    }

    public function index()
    {
        $nav = [
            "part"=> "بخش مدیریت کاربران",
            "navigation" =>[
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "لیست کاربران "
                ]
            ]
        ];

        $userSearch = "";
        if (isset($_GET["user"])){
            $userSearch = $_GET["user"];
        }
        $users = ContextRepository::UserRepository()->SearchUser($userSearch);

        return view("admin.user.user.index" , compact("nav" , "users" , "userSearch"));
    }



    public function show(User $user)
    {
        /// navigation page
        $nav = [
            "part"=> "بخش مدیریت کاربران",
            "navigation" =>[
                [
                    "route" => "admin.users.comment.index" ,
                    "current" => 0,
                    "title" => "لیست کاربران"
                ],
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "اطلاعات کاربر"
                ]
            ]
        ];

        return view("admin.user.user.show" , compact("nav" , "user"));
    }

    public function changeInfo(UserRequest $request, user $user)
    {
        $data = $request->all();

        ContextRepository::CommentRepository()->updateResult($user , $data);

        return $this ->redirectIndex("اطلاعات کاربر انتخاب شده با موفقیت ویرایش شد");
    }









    public function status(User $user){
        $result = ContextRepository::UserRepository()->changeStatusResult($user);
        if ($result["status"]){
            return $result["exp"];
        }
    }




}
