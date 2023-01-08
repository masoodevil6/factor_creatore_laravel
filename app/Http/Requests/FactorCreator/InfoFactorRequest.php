<?php

namespace App\Http\Requests\FactorCreator;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class InfoFactorRequest extends FormRequest
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
            "store_name" => "nullable|min:2" ,
            "store_phone" => "nullable|min:2" ,
            "store_address" => "nullable|min:2" ,
            "customer_name" => "nullable|min:2" ,
            "customer_phone" => "nullable|min:2" ,
            "customer_address" => "nullable|min:2" ,
            "description" => "nullable|min:2" ,
        ];
    }

    public function attributes()
    {
        return [
            "store_name" => "عنوان فروشگاه",
            "store_phone" => "شماره فروشگاه" ,
            "store_address" => "آدرس فروشگاه" ,
            "customer_name" => "نام مشتری" ,
            "customer_phone" => "شماره مشتری" ,
            "customer_address" => "آدرس مشتری" ,
            "description" => "توضیحات تکمیلی" ,
        ];
    }
}
