<?php

namespace App\Http\Requests\CustomerPanel;

use Illuminate\Foundation\Http\FormRequest;

class PanelTicketSubmitRequest extends FormRequest
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
            "ticket_category_id" =>  "nullable|exists:ticket_categories,id" ,
            "ticket_id" => "nullable|exists:tickets,id" ,
            "title" => "required|string" ,
            "text" => "required|string" ,
        ];
    }
}
