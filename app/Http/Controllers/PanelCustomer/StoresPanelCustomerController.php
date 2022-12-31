<?php

namespace App\Http\Controllers\PanelCustomer;

use App\Http\Controllers\PanelCustomer\Panels\ListCustomerPanels;
use App\Http\Requests\CustomerPanel\PanelUserStoreSubmitRequest;
use Illuminate\Http\Request;

class StoresPanelCustomerController extends BasePanelCustomerPanel
{

    public function __construct(ListCustomerPanels $listCustomerPanels)
    {
        $this->panelName = "stores";
        parent::__construct($listCustomerPanels);
    }



    public function getListUserStores(){
        return $this->panel->returnPanelView();
    }

    public function getInfoUserStores(Request $request){
        return $this->panel->getInfoUserStoreSelected($request->get("user_store_id"));
    }

    public function submitNewUserStore(PanelUserStoreSubmitRequest $request , $store=0 ){
        $this->panel->submitDataUserStore($store , $request->get("name") , $request->get("phone") , $request->get("address"));
        return $this->redirectPanel();
    }

    public function deleteUserStore($store){
        $this->panel->deleteUserStore($store);
        return $this->redirectPanel();
    }


}
