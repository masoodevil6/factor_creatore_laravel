<?php

namespace App\Http\Requests\Auth\Customer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class LoginOtpCodeRegisterRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "otp_code" => "required|min:6|max:6" ,
        ];
    }

    public function attributes()
    {
        return [
            "otp_code" => "کد تأیید",
        ];
    }
}
