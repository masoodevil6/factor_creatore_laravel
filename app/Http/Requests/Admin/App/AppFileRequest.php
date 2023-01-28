<?php

namespace App\Http\Requests\Admin\App;

use Illuminate\Foundation\Http\FormRequest;

class AppFileRequest extends FormRequest
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
            "name"=>  "required|string" ,
            "version"=>  "required|string" ,
            "app_category_id" => "required|exists:app_categories,id" ,
        ];

        if($this->isMethod("post")){
            $roles["file_app"] = "required";
        }
        else{
            $roles["file_app"] = "nullable";
        }

        return $roles;
    }

    public function attributes()
    {
        return [
            "name" => "عنوان فایل" ,
            "version" => "نسخه فایل" ,
            "app_categories" => " دسته بندی برنامه" ,
            "file_app" => " فایل" ,
        ];
    }


}
