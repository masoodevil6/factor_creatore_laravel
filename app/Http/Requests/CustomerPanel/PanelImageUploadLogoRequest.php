<?php

namespace App\Http\Requests\CustomerPanel;

use Illuminate\Foundation\Http\FormRequest;

class PanelImageUploadLogoRequest extends FormRequest
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
            "logo" => "image|mimes:png,jpg,jpeg" ,
        ];
    }


    public function attributes(){
        return [
            "logo" => "تصویر لوگو"
        ];
    }
}
