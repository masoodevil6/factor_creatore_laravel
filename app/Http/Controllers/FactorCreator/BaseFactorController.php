<?php

namespace App\Http\Controllers\FactorCreator;

use App\Http\Controllers\Customer\CustomerMainController;
use App\Repositories\ContextRepository;


class BaseFactorController extends CustomerMainController
{

    protected function getNavProcessFactorCreator($step){

        return [
            "nav" =>
                [
                    [
                    "route" => "customer.create-factor.index" ,
                    "title" => "فاکتور جدید"
                    ]
                ],
            "stepFactor" => $step ,
        ];
    }





    protected function getFactorTemplate(){
        return  ContextRepository::TemplateFactorRepository()->GetInfoTemplateFactor();
    }



    protected function getTotalInfoProduct(){
        $passPrice = ContextRepository::FactorRepository()->GetStandardPassPrice();
        $resultExp["factor"] = $this->getFactorTemplate();
        $resultExp["products"] = $resultExp["factor"]->products;
        $resultExp["total_price"] = 0;
        $resultExp["total_price_text"] = 0;

        foreach ($resultExp["products"] as $key=> $itemProduct){
            $resultExp["total_price"] += $itemProduct->total;
        }

        $resultExp["total_price_text"] = persianPriceFormat($resultExp["total_price"])." ".$passPrice;

        return $resultExp;
    }








}

