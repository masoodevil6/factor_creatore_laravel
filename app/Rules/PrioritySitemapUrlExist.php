<?php

namespace App\Rules;

use App\Repositories\ContextRepository;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Config;


class PrioritySitemapUrlExist implements Rule
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
        $priorities = ContextRepository::SitemapUrlRepository()->getListSiteMapPriority();
        if ($value == null){
            $value = "";
        }
        foreach ($priorities as $key => $priority){
            if ($priority["priority_title_en"] == $value){
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
        return ':attribute در لیست priority ها موجود نمی باشد';
    }
}
