<?php

namespace App\Http\Requests\Admin\Sitemap;

use App\Rules\ChangeFreqSitemapUrlExist;
use App\Rules\PrioritySitemapUrlExist;
use Illuminate\Foundation\Http\FormRequest;

class SitemapUrlRequest extends FormRequest
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
            "title" => "required|string",
            "url" => "required|string",
            "priority" => [ new PrioritySitemapUrlExist()],
            "changefreq" =>  [ new ChangeFreqSitemapUrlExist()],
            "sitemap_file_id" =>  "required|exists:sitemap_files,id" ,
        ];
    }
}
