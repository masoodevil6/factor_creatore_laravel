<?php

namespace App\Http\Requests\Admin\Forms;

use App\Rules\FormExist;
use App\Rules\FormSize;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TestFileFormFactorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guard("admin")->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "class_name" => ["required" , new FormExist()] ,
            "size" => ["required" , new FormSize()] ,
            "product_num" => "required|numeric"
        ];
    }

    public function attributes(){
        return [
            "class_name" => "فرم",
            "size" => "سایز صفحه",
            "product_num" => "تعداد کالاها"
        ];
    }
}
