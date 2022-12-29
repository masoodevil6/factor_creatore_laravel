<?php

namespace App\Http\Controllers\Admin\Subscribes;

use App\Http\Controllers\Admin\MainAdminController;
use App\Http\Requests\Admin\Subscribe\SubscribePaymentRequest;
use App\Models\Bank;
use App\Models\Subscribes\Subscribe;
use App\Models\Subscribes\SubscribePayment;
use App\Models\User;
use App\Repositories\ContextRepository;
use Illuminate\Http\Request;

class SubscribePaymentsAdminController extends MainAdminController
{

    function __construct()
    {
        parent::__construct(route("admin.subscribes.subscribe-payment.index"));
    }


    public function index()
    {
        $nav = [
            "part"=> "بخش مدیریت تراکنش های اشتراک",
            "navigation" =>[
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "لیست تراکنش های اشتراک ها"
                ]
            ]
        ];

        $userSearch = "";
        if (isset($_GET["user"])){
            $userSearch = $_GET["user"];
        }
        $resSearch = "";
        if (isset($_GET["res"])){
            $resSearch = $_GET["res"];
        }
        $statusSearch = -1;
        if (isset($_GET["status"])){
            $statusSearch = $_GET["status"];
        }
        $subscribeSearch = -1;
        if (isset($_GET["sub"])){
            $subscribeSearch = $_GET["sub"];
        }
        $subscribePayments = ContextRepository::SubscribePaymentRepository()->SearchSubscribePayment($userSearch , $resSearch , $statusSearch , $subscribeSearch);

        $subscribes = ContextRepository::SubscribeRepository()->getAllResult();

        return view("admin.subscribe.subscribe-payments.index" ,
            compact("nav" , "subscribePayments" , "subscribes" , "userSearch", "resSearch", "statusSearch", "subscribeSearch")
        );
    }




    public function create()
    {
        /// navigation page
        $nav = [
            "part"=> "بخش مدیریت اشتراک ها",
            "navigation" =>[
                [
                    "route" => "admin.subscribes.subscribe-payment.index" ,
                    "current" => 0,
                    "title" => "لیست تراکنش های اشتراک ها"
                ],
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "افزودن تراکنش اشتراک"
                ]
            ]
        ];

        $subscribes = ContextRepository::SubscribeRepository()->getAllResult();
        $banks = ContextRepository::BankRepository()->getAllResult();

        return view("admin.subscribe.subscribe-payments.create" , compact("nav"  , "subscribes" , "banks"));
    }


    public function store(SubscribePaymentRequest $request)
    {
        $input = $request->all();
        $input["time_set"]= setTimeStampMiladi($input["year"] , $input["month"]);
        $input["admin_add"]=1;
        $input["status"]=1;

        $subscribePaymentId = ContextRepository::SubscribePaymentRepository()->CreateRecordForUser($input["user_email"] , $input);
        if ($subscribePaymentId > 0){
            return $this ->redirectIndex("اشتراک برای کاربر مورد نظر با موفقیت اضافه شد", false , route("admin.subscribes.subscribe-payment.show" , $subscribePaymentId ));
        }

        return $this ->redirectIndex("کاربری یافت نشد" , false , route("admin.subscribes.subscribe-payment.store"));

     }








    public function edit(SubscribePayment $subscribePayment)
    {
        /// navigation page
        $nav = [
            "part"=> "بخش مدیریت اشتراک ها",
            "navigation" =>[
                [
                    "route" => "admin.subscribes.subscribe-payment.index" ,
                    "current" => 0,
                    "title" => "لیست تراکنش های اشتراک ها"
                ],
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "اصلاح تراکنش اشتراک"
                ]
            ]
        ];

        $subscribes = ContextRepository::SubscribeRepository()->getAllResult();
        $banks = ContextRepository::BankRepository()->getAllResult();

        return view("admin.subscribe.subscribe-payments.create" , compact("nav" , "subscribePayment" , "subscribes" , "banks"));
    }

    public function update(SubscribePaymentRequest $request, SubscribePayment $subscribePayment)
    {
        $input = $request->all();
        ContextRepository::SubscribePaymentRepository()->updateResult($subscribePayment , $input);
        return $this ->redirectIndex("اشتراک کاربر مورد نظر با موفقیت اصلاح شد" , false , route("admin.subscribes.subscribe-payment.show" , $subscribePayment->id ));
    }





    public function destroy(SubscribePayment $subscribePayment)
    {
        ContextRepository::SubscribePaymentRepository()->deleteResult($subscribePayment);
        return $this ->redirectIndex("اشتراک کاربر مورد نظر با موفقیت حذف شد");
    }






    public function show(SubscribePayment $subscribePayment)
    {
        /// navigation page
        $nav = [
            "part"=> "بخش مدیریت اشتراک ها",
            "navigation" =>[
                [
                    "route" => "admin.subscribes.subscribe-payment.index" ,
                    "current" => 0,
                    "title" => "لیست تراکنش های اشتراک ها"
                ],
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "تراکنش اشتراک"
                ]
            ]
        ];

        return view("admin.subscribe.subscribe-payments.show" , compact("nav" , "subscribePayment"));
    }


}
