<?php

namespace App\Http\Controllers\PanelCustomer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PanelCustomer\Panels\ListCustomerPanels;
use Illuminate\Http\Request;

class SubscribePanelCustomerController extends BasePanelCustomerPanel
{

    public function __construct(ListCustomerPanels $listCustomerPanels)
    {
        $this->panelName = "subscribes";
        parent::__construct($listCustomerPanels);
    }


    public function getInfoUserSubscribe(Request $request){
        return $this->panel->getInfoUserSubscribe($request->get("user_subscribe_id"));
    }

    public function deleteUserSubscribe($store){
        $this->panel->deleteUserSubscribe($store);
        return $this->redirectPanel();
    }
}
