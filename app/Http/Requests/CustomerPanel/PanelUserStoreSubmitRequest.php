<?php

namespace App\Http\Requests\CustomerPanel;

use App\Rules\Phone;
use Illuminate\Foundation\Http\FormRequest;

class PanelUserStoreSubmitRequest extends FormRequest
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
            "phone" => ["required" , "string" ] ,
            "address" => "required|string" ,
        ];
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
