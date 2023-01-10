<?php
namespace App\Http\Controllers\PanelCustomer\Panels\PanelCustomer;

use App\Http\Controllers\PanelCustomer\Panels\InterfacePanelCustomer\IPanelSubscribeCustomer;
use App\Repositories\ContextRepository;

class PanelSubscribeCustomer extends BasePanelCustomer implements IPanelSubscribeCustomer {

    public function __construct()
    {
        $this->setTitleFa("اشتراک ها");
        $this->setTitleEn("subscribes");
        $this->setIcon("fa fa-credit-card");
    }


    public function returnPanelView()
    {
        $titleFa = $this->getTitleFa();
        $titleEn = $this->getTitleEn();
        $userSubscribes = ContextRepository::SubscribePaymentRepository()->GetAllSubscribeAuthUser();
        $subscribeActive = ContextRepository::SubscribePaymentRepository()->GetSubscribeActiveNowWithTimeStamp();
        return view("customer-panels.panels.panel-subscribes.index" , compact("titleFa" , "titleEn" ,  "userSubscribes" , "subscribeActive"))->render();
    }

    public function getInfoUserSubscribe($userSubscribeId){
        $userSubscribe = ContextRepository::SubscribePaymentRepository()->GetInfoSubscribeAuthUser($userSubscribeId);
        if (!empty($userSubscribe)){
            return view("customer-panels.panels.panel-subscribes.show-subscribe" , compact("userSubscribe"))->render();
        }
        return null;
    }

    public function deleteUserSubscribe($userSubscribeId=0){
        ContextRepository::SubscribePaymentRepository()->DeleteSubscribeAuthUser($userSubscribeId);
    }




}