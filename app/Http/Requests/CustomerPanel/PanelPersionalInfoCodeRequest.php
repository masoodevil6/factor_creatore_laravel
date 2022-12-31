<?php

namespace App\Http\Requests\CustomerPanel;

use Illuminate\Foundation\Http\FormRequest;

class PanelPersionalInfoCodeRequest extends FormRequest
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
            "code" => "required|min:2|max:10" ,
            "token" => "required|min:2|string" ,
        ];
    }


    public function attributes()
    {
        return [
            "code" => "کد اعتبار سنجی",
            "token" => "اعتبار سنجی",
        ];
    }
}
