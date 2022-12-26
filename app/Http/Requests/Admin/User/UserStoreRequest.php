<?php

namespace App\Http\Requests\Admin\User;

use App\Rules\Phone;
use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            "name" => "required|string" ,
            "phone" => ["required" , "string" , new Phone()] ,
            "address" => "required|string" ,
        ];
        if($this->isMethod("post")){
            $roles["user_email"] = "required|min:11|max:64|exists:users,email";
        }

        return $roles;
    }


    public function attributes()
    {
        return [
            "name" => "عنوان فروشگاه" ,
            "phone" => "شماره فروشگاه" ,
            "address" => "ادرس فروشگاه" ,
        ];
    }
}
