<?php

namespace App\Http\Requests\Auth\Customer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class LoginInputRegisterRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "inputLogin" => "required|min:11|max:64|regex:/^[a-zA-Z0-9_.@\+]*$/" ,
        ];
    }

    public function attributes()
    {
        return [
            "inputLogin" => "شماره موبایل یا ایمیل"
        ];
    }
}
