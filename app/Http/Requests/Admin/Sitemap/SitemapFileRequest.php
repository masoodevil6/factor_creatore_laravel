<?php

namespace App\Http\Requests\Admin\Sitemap;

use Illuminate\Foundation\Http\FormRequest;

class SitemapFileRequest extends FormRequest
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
            "title_fa" => "required|string",
            "title_en" => "required|string",
        ];
    }


    public function attributes()
    {
        return [
            "title_fa" => "عنوان فارسی",
            "title_en" => "عنوان انگلیسی",
        ];
    }
}
