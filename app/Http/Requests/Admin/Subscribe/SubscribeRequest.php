<?php

namespace App\Http\Requests\Admin\Subscribe;

use Illuminate\Foundation\Http\FormRequest;

class SubscribeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "title" => "required|min:2|max:750" ,
            "real_price" => "nullable|numeric" ,
            "off_price" => "nullable|numeric" ,
            "duration" => "nullable|numeric" ,
            "download" => "nullable|numeric" ,
            "play" => "nullable|numeric" ,
            "status" => "required|numeric|in:0,1",
            "selected" => "required|numeric|in:0,1",
            "description" => "required|min:2" ,
        ];
    }

    public function attributes(){
        return [
            "title" => "عنوان اشتراک",
            "real_price" => "هزینه اشتراک",
            "off_price" => "تخفیف اشتراک",
            "duration" => "مدت اعتبار",
            "download" => "تعداد دانلود",
            "play" => "تعداد پخش",
            "status" => "وضعیت اشتراک",
            "selected" => "اشتراک منتخب",
            "description" => "توصیف اشتراک",
        ];
    }
}
