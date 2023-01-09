<?php

namespace App\Http\Requests\FactorCreator;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class InfoImageFactorRequest extends FormRequest
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
            "type_logo_name" => "required|numeric|in:-1,0,1" ,
            "type_mohr_name" => "required|numeric|in:-1,0,1" ,
        ];
    }

    public function attributes(){
        return [
            "type_logo_name" => "نوع ذخیره لوگو",
            "type_mohr_name" => "نوع ذخیره مهر"
        ];
    }
}
