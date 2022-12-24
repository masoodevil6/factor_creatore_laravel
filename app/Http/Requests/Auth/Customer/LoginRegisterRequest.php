<?php

namespace App\Http\Requests\Auth\Customer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class LoginRegisterRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $route = Route::current();

        if ($route->getName() == "auth.customer.loginRegister"){

            return [
                "inputLogin" => "required|min:11|max:64|regex:/^[a-zA-Z0-9_.@\+]*$/" ,
            ];

        }
        else if ($route->getName() == "auth.customer.loginConfirm"){

            return [
                "otp_code" => "required|min:6|max:6" ,
            ];

        }
    }

    public function attributes()
    {
        return [
            "inputLogin" => "شماره موبایل یا ایمیل",
            "otp_code" => "کد تأیید",
        ];
    }
}
