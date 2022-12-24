<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class TicketCategoriesRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(){
        return  [
            "title" => "required|min:2|max:750" ,
            "status" => "required|numeric|in:0,1" ,
        ];
    }


    public function attributes(){
        return [
            "title" => "عنوان دسته",
            "status" => "وضعیت دسته",
        ];
    }
}
