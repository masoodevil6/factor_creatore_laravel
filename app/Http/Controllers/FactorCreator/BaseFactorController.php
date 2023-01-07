<?php

namespace App\Http\Controllers\FactorCreator;

use App\Http\Controllers\Customer\CustomerMainController;
use App\Repositories\ContextRepository;


class BaseFactorController extends CustomerMainController
{

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

