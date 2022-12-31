<?php

namespace App\Http\Requests\CustomerPanel;

use App\Rules\Phone;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PanelPersionalInfoPhoneOrEmailRequest extends FormRequest
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
        $type = $this->request->get("type");

        $resultExp = [
            "type" => ["required" , Rule::in(["email","phone"]) ]
        ];
        if ($type == "email"){
            $resultExp["input"] = "required|min:11|max:64|regex:/^[a-zA-Z0-9_.@\+]*$/";
        }
        else if ($type == "phone"){
            $resultExp["input"] = ['sometimes','nullable' ,'min:10','max:13' , 'unique:users,mobile' , new Phone()];
        }

        return $resultExp;
    }


    public function attributes()
    {
        return [
            "mobile" => "موبایل",
            "type" => "نوع"
        ];
    }
}
