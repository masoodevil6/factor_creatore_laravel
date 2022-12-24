<?php

namespace App\Http\Requests\Admin\Publics;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
        return [
            "image" => "nullable|image|mimes:png,jpg,jpeg,webp" ,
            "icon" => "nullable|mimes:ico" ,

            "site_name" => "required|string" ,
            "site_phone" => "nullable|string" ,
            "site_email" => "nullable|string" ,
            "address" => "nullable|string" ,

            "facebock" => "nullable|string" ,
            "instagram" => "nullable|string" ,
            "telegram" => "nullable|string" ,
            "twiter" => "nullable|string" ,

            "about_us" => "nullable|string" ,
        ];
    }


    public function attributes()
    {
        return [
            "image" => "لوگو سایت",
            "icon" => "ایکون سایت",
            "site_name" => "عنوان سایت",
            "site_phone" => "تلفن سایت",
            "site_email" => "ایمیل سایت",
            "address" => "آدرس سایت",
            "facebock" => "آدرس فیسبوک",
            "instagram" => "آدرس ایستاگرام",
            "telegram" => "آدرس تلگرام",
            "twiter" => "آدرس تویتر",
        ];
    }
}
