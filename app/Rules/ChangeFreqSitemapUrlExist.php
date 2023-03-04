<?php

namespace App\Rules;

use App\Repositories\ContextRepository;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Config;


class ChangeFreqSitemapUrlExist implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $changeFreqs = ContextRepository::SitemapUrlRepository()->getListSiteMapChangefreq();
        if ($value == null){
            $value = "";
        }
        foreach ($changeFreqs as $key => $changeFreq){
            if ($changeFreq["changefreq_title_en"] == $value){
                return true;
            }
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute در لیست changefreq ها موجود نمی باشد';
    }
}
