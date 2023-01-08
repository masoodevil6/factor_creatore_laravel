<?php

namespace App\Http\Requests\FactorCreator;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class InfoFactorProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "id" => "sometimes" ,
            "name" => "required|min:2" ,
            "num" => "required" ,
            "unit" => "nullable" ,
            "off" => "nullable" ,
            "price" => "nullable"
        ];
    }

    public function attributes()
    {
        return [
            "name" => "عنوان کالا",
            "num" => "تعداد کالا" ,
            "unit" => "واحد" ,
            "off" => "تخفیف" ,
            "price" => "هزینه"
        ];
    }
}
