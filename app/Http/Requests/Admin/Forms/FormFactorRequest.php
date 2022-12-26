<?php

namespace App\Http\Requests\Admin\Forms;

use App\Rules\FormExist;
use Illuminate\Foundation\Http\FormRequest;

class FormFactorRequest extends FormRequest
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
            "name" => "required|string" ,
            "class_name" => ["required" , new FormExist()] ,
            "image" => "image|mimes:png,jpg,jpeg,webp" ,
            "form_category_id" => "required|exists:form_categories,id" ,
            "status" => "required|numeric|in:0,1"
        ];
    }


    public function attributes(){
        return [
            "title" => "عنوان فرم",
            "class_name" => "فرم",
            "image" => "نمونه تصویر فرم",
            "form_category_id" => "دسته بندی فرم",
            "status" => "وضعیت فرم",
        ];
    }
}
