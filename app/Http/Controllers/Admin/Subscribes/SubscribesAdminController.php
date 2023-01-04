<?php

namespace App\Http\Controllers\Admin\Subscribes;

use App\Http\Controllers\Admin\MainAdminController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Subscribe\SubscribeRequest;
use App\Models\Subscribes\Subscribe;
use App\Repositories\ContextRepository;
use Illuminate\Http\Request;

class SubscribesAdminController extends MainAdminController
{

    function __construct()
    {
        parent::__construct(route("admin.subscribes.subscribe.index"));
    }



    public function index()
    {
        $nav = [
            "part"=> "بخش مدیریت اشتراک ها",
            "navigation" =>[
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "لیست اشتراک ها"
                ]
            ]
        ];

        $subSearch = "";
        if (isset($_GET["sub"])){
            $subSearch = $_GET["sub"];
        }
        $subscribes = ContextRepository::SubscribeRepository()->SearchSubscribe($subSearch);

        return view("admin.subscribe.subscribes.index" , compact("nav" , "subscribes" , "subSearch"));
    }


    public function create()
    {
        /// navigation page
        $nav = [
            "part"=> "بخش مدیریت اشتراک ها",
            "navigation" =>[
                [
                    "route" => "admin.subscribes.subscribe.index" ,
                    "current" => 0,
                    "title" => "لیست اشتراک ها"
                ],
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "افزودن اشتراک جدید"
                ]
            ]
        ];

        return view("admin.subscribe.subscribes.create" , compact("nav"));
    }


    public function store(SubscribeRequest $request)
    {
        $input = $request->all();
        ContextRepository::SubscribeRepository()->addResult($input);
        return $this ->redirectIndex("اشتراک جدید با موفقیت اضافه شد");
    }




    public function edit(Subscribe $subscribe)
    {
        /// navigation page
        $nav = [
            "part"=> "بخش مدیریت اشتراک ها",
            "navigation" =>[
                [
                    "route" => "admin.subscribes.subscribe.index" ,
                    "current" => 0,
                    "title" => "لیست اشتراک ها"
                ],
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "ویرایش اشتراک "
                ]
            ]
        ];
        return view("admin.subscribe.subscribes.create" , compact("nav" , "subscribe"));
    }

    public function update(SubscribeRequest $request, Subscribe $subscribe)
    {
        $input = $request->all();
        ContextRepository::SubscribeRepository()->updateResult($subscribe , $input);
        return $this ->redirectIndex("اشتراک با موفقیت اصلاح شد");
    }



    public function destroy(Subscribe $subscribe)
    {
        ContextRepository::SubscribeRepository()->deleteResult($subscribe);
        return $this ->redirectIndex("اشتراک با موفقیت حذف شد");
    }


    public function status(Subscribe $subscribe){
        $result = ContextRepository::SubscribeRepository()->changeStatusResult($subscribe);
        if ($result["status"]){
            return $result["exp"];
        }
    }


    public function selected(Subscribe $subscribe){
        $result = ContextRepository::SubscribeRepository()->changeStatusResult($subscribe , "selected");
        if ($result["status"]){
            return $result["exp"];
        }
    }
}
