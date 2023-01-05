<?php

namespace App\Http\Controllers\Customer;

use App\Repositories\ContextRepository;


class CustomerAboutUsController extends CustomerMainController
{
    public function aboutUs(){

        $formsSelected = ContextRepository::FormRepository()->GetLimitRandomSelectedForm();
        $settings = $this->setting;

        return view("customer.about-us.index" , compact("formsSelected" , "settings"));
    }
}
