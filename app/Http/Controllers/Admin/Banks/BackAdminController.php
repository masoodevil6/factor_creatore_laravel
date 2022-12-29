<?php

namespace App\Http\Controllers\Admin\Banks;

use App\Http\Controllers\Admin\MainAdminController;
use App\Http\Requests\Admin\Bank\BankRequest;
use App\Models\Banks\Bank;
use App\Repositories\ContextRepository;
use Illuminate\Http\Request;

class BackAdminController extends MainAdminController
{
    function __construct()
    {
        parent::__construct(route("admin.banks.bank.index"));
    }



    public function index(){
        $nav = [
            "part"=> "بخش مدیریت بانک ها",
            "navigation" =>[
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "لیست بانک ها"
                ]
            ]
        ];

        $bankSearch = "";
        if (isset($_GET["bank"])){
            $bankSearch = $_GET["bank"];
        }
        $banks = ContextRepository::BankRepository()->SearchBank($bankSearch);

        return view("admin.banks.bank.index" , compact("nav" , "banks" , "bankSearch"));
    }



    public function create(){
        /// navigation page
        $nav = [
            "part"=> "بخش مدیریت بانک ها",
            "navigation" =>[
                [
                    "route" => "admin.banks.bank.index" ,
                    "current" => 0,
                    "title" => "لیست بانک ها"
                ],
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "افزودن بانک"
                ]
            ]
        ];

        return view("admin.banks.bank.create" , compact("nav"));
    }

    public function store(BankRequest $request){
        $input = $request->all();
        ContextRepository::BankRepository()->addResult($input);
        return $this ->redirectIndex("بانک جدید با موفقیت اضافه شد");
    }




    public function edit(Bank $bank){
        /// navigation page
        $nav = [
            "part"=> "بخش مدیریت بانک ها",
            "navigation" =>[
                [
                    "route" => "admin.banks.bank.index" ,
                    "current" => 0,
                    "title" => "لیست بانک ها"
                ],
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "ویرایش بانک"
                ]
            ]
        ];

        return view("admin.banks.bank.create" , compact("nav" , "bank"));
    }

    public function update(BankRequest $request, Bank $bank){
        $input = $request->all();
        ContextRepository::BankRepository()->updateResult($bank , $input);
        return $this ->redirectIndex("بانک با موفقیت اصلاح شد");
    }



    public function destroy(Bank $bank){
        ContextRepository::BankRepository()->deleteResult($bank);
        return $this ->redirectIndex("بانک با موفقیت حذف شد");
    }


    public function status(Bank $bank){
        $result = ContextRepository::BankRepository()->changeStatusResult($bank);
        if ($result["status"]){
            return $result["exp"];
        }
    }
}
