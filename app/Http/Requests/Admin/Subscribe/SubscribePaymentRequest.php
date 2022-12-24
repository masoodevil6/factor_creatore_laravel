<?php

namespace App\Http\Requests\Admin\Subscribe;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;


class SubscribePaymentRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        $route = Route::current();
        $resultExp = [
            "subscribe_id" =>  "required|numeric|min:0|exists:subscribes,id" ,
            "bank_id" =>  "nullable|numeric|exists:banks,id" ,
            "res_num" =>  "nullable|string" ,
            "ref_num" =>  "nullable|string" ,
            "amount" =>  "nullable|numeric" ,
            "phone" =>  "nullable|string" ,
        ];

        if ($route->getName() == "admin.subscribes.subscribePayments.store"){
            $resultExp["user_email"] = "required|min:11|max:64|regex:/^[a-zA-Z0-9_.@\+]*$/|exists:users,email" ;
        }

        return $resultExp;
    }

    public function attributes(){
        return [
            "user_email" => "ایمیل کاربر",
            "subscribe_id" => "اشتراک",
            "bank_id" => "بانک",
            "res_num" => "شماره رزر",
            "ref_num" => "شماره تراکنش",
            "amount" => "مبلغ",
            "phone" => "شماره تماس",
        ];
    }
}
