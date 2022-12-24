<?php

namespace App\Http\Requests\Admin\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            "title" =>  "required|string" ,
            "status" => "required|numeric|in:0,1" ,
        ];
    }


    public function attributes()
    {
        return [
            "title" => "عنوان پنل",
            "status" => "وضعیت پنل",
        ];
    }
}
