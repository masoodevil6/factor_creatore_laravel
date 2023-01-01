<?php

namespace App\Http\Controllers\PanelCustomer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PanelCustomer\Panels\ListCustomerPanels;
use Illuminate\Http\Request;

class FactorsPanelCustomerController extends BasePanelCustomerPanel
{
    public function __construct(ListCustomerPanels $listCustomerPanels)
    {
        $this->panelName = "factors";
        parent::__construct($listCustomerPanels);
    }

    public function getInfoUserFactor(Request $request){
        return $this->panel->getInfoUserFactor($request->get("user_factor_res_num"));
    }

    public function downloadUserFactor($resNum){
        return $this->panel->downloadUserFactor($resNum);
    }

    public function deleteUserFactor($resNum){
        $this->panel->deleteUserFactor($resNum);
        return $this->redirectPanel();
    }
}
