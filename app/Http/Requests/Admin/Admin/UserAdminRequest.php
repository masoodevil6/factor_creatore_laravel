<?php

namespace App\Http\Requests\Admin\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $roles = [
            "admin_id" => "required|exists:admins,id" ,
            "status" => "required|numeric|in:0,1" ,
        ];

        if($this->isMethod("post")){
            $roles["user_email"] = "required|min:11|max:64|regex:/^[a-zA-Z0-9_.@\+]*$/|exists:users,email";

        }

        return $roles;
    }

    public function attributes()
    {
        return [
            "user_email" => "ایمیل کاربر",
            "admin_id" => "پنل",
            "status" => "وضعیت",
        ];
    }
}
