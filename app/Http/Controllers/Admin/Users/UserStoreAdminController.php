<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Admin\MainAdminController;
use App\Http\Requests\Admin\User\UserStoreRequest;
use App\Models\Users\UserStore;
use App\Repositories\ContextRepository;
use Illuminate\Http\Request;

class UserStoreAdminController extends MainAdminController
{

    function __construct()
    {
        parent::__construct(route("admin.users.user-store.index"));
    }


    public function index(){
        $nav = [
            "part"=> "بخش مدیریت فروشگاه ها",
            "navigation" =>[
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "لیست فروشگاه ها"
                ]
            ]
        ];

        $userSearch = "";
        if (isset($_GET["user"])){
            $userSearch = $_GET["user"];
        }
        $storeSearch = "";
        if (isset($_GET["store"])){
            $storeSearch = $_GET["store"];
        }
        $userStores = ContextRepository::UserStoreRepository()->SearchUserStore($userSearch , $storeSearch);

        return view("admin.user.user-stores.index" , compact("nav" , "userStores" , "userSearch" , "storeSearch"));
    }




    public function create(){
        /// navigation page
        $nav = [
            "part"=> "بخش مدیریت فروشگاه ها",
            "navigation" =>[
                [
                    "route" => "admin.public.unit.index" ,
                    "current" => 0,
                    "title" => "لیست فروشگاه ها"
                ],
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "افزودن فروشگاه"
                ]
            ]
        ];

        return view("admin.user.user-stores.create" , compact("nav"));
    }

    public function store(UserStoreRequest $request){
        $input = $request->all();
        $input["phone"] = filterPhoneNumber($input["phone"]);
        $user=ContextRepository::UserRepository()->GetUserWithEmail($input["user_email"]);
        if (!empty($user)){
            $input["user_id"]=$user["id"];
            ContextRepository::UserStoreRepository()->addResult($input);
            return $this ->redirectIndex("فروشگاه جدید با موفقیت اضافه شد");
        }
        return $this ->redirectIndex("کاربر مورد نظر یافت نشد" , true );

    }





    public function edit(UserStore $userStore){
        /// navigation page
        $nav = [
            "part"=> "بخش مدیریت فروشگاه ها",
            "navigation" =>[
                [
                    "route" => "admin.public.unit.index" ,
                    "current" => 0,
                    "title" => "لیست فروشگاه ها"
                ],
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "ویرایش فروشگاه"
                ]
            ]
        ];

        return view("admin.user.user-stores.create" , compact("nav" , "userStore"));
    }

    public function update(UserStoreRequest $request, UserStore $userStore){
        $input = $request->all();
        $input["phone"] = filterPhoneNumber($input["phone"]);
        ContextRepository::UserStoreRepository()->updateResult($userStore , $input);
        return $this ->redirectIndex("فروشگاه با موفقیت اصلاح شد");
    }


    public function destroy(UserStore $userStore){
        ContextRepository::UserStoreRepository()->deleteResult($userStore);
        return $this ->redirectIndex("فروشگاه با موفقیت حذف شد");
    }

}
