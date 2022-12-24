<?php

namespace App\Http\Requests\Admin\Password;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'last_password' => 'required',
            'password' => 'required|confirmed|min:6',
        ];
    }

    public function attributes()
    {
        return [
            "last_password" => "پسورد سابق",
            "password" => "پسورد پنل ادمین",
        ];
    }
}
