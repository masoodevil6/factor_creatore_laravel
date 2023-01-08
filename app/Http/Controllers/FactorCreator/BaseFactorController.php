<?php

namespace App\Http\Controllers\FactorCreator;

use App\Http\Controllers\Customer\CustomerMainController;
use App\Repositories\ContextRepository;


class BaseFactorController extends CustomerMainController
{

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






    protected function getListSubscribeActive(){
        return ContextRepository::SubscribePaymentRepository()->GetSubscribeActiveNow();
    }

    protected function returnInfoForm($formId , $subscribeActives=null){
        if ($subscribeActives == null){
            $subscribeActives = $this->getListSubscribeActive();
        }
        $form = ContextRepository::FormRepository()->getResult($formId , true);
        $form->active = $this->returnSateActiveForm($subscribeActives , $form->subscribe_id);
        return [
            "subscribeActives" => $subscribeActives ,
            "form" => $form
        ];
    }

    protected function returnSateActiveForm($subscribeActives , $subscribe_id){
        return ContextRepository::FormRepository()->SetStateActiveForm($subscribeActives , $subscribe_id);
    }

}

