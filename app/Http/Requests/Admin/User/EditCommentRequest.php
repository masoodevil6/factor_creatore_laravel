<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class EditCommentRequest extends FormRequest
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
        return  [
            "body" => "required|min:2|max:750" ,
            "approved" => "required|numeric|in:0,1" ,
            "status" => "required|numeric|in:0,1" ,
        ];
    }



    public function attributes()
    {
        return [
            "body" => "متن نظر",
            "approved" => "تاییدیه",
            "status" => "وضعیت",
        ];
    }
}
