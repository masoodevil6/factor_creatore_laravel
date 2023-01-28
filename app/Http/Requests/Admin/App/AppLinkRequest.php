<?php

namespace App\Http\Requests\Admin\App;

use Illuminate\Foundation\Http\FormRequest;

class AppLinkRequest extends FormRequest
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
            "name"=>  "required|string" ,
            "address"=>  "nullable|string" ,
            "image" => "nullable|image|mimes:png,jpg,jpeg,webp" ,
            "app_file_id" => "nullable|exists:app_files,id" ,
            "app_category_id" => "required|exists:app_categories,id" ,
            "status" => "required|numeric|in:0,1" ,
        ];
    }


    public function attributes()
    {
        return [
            "name" => "عنوان لینک " ,
            "address" => "آدرس لینک " ,
            "image" => " تصویر لینک " ,
            "app_file_id" => "فایل لینک " ,
            "app_categories" => " دسته بندی فایل" ,
            "status" => " وضعیت لینک فایل" ,
        ];
    }
}
