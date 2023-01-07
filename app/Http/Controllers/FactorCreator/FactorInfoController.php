<?php

namespace App\Http\Controllers\FactorCreator;

use App\Http\Controllers\Customer\CustomerMainController;
use Illuminate\Http\Request;

class FactorInfoController extends BaseFactorController
{
    public function index($formId){

        $nav = [
            [
                "route" => "customer.create-factor.index" ,
                "title" => "فاکتور جدید"
            ]
        ];
        $stepFactor = 2;
        ///----------------------------------------------------------------

        $infoForm = $this->returnInfoForm($formId);
        $form = $infoForm["form"];
        if ($form -> active){



            return view("factor-creator.info.index" ,
                compact("nav" , "stepFactor" )
            );
        }
        else{
            return redirect()->route("customer.create-factor.index");
        }

    }
}
