<?php

namespace App\Http\Controllers\FactorCreator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FactorImageController extends BaseFactorController
{
    public function index(){

        $nav = [
            [
                "route" => "customer.create-factor.index" ,
                "title" => "فاکتور جدید"
            ]
        ];
        $stepFactor = 3;
        ///----------------------------------------------------------------


        return view("factor-creator.images.index" ,
            compact("nav" , "stepFactor" )
        );

    }
}
