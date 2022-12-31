<?php

namespace App\Http\Controllers\PanelCustomer\Panels;

use App\Http\Controllers\PanelCustomer\Panels\PanelCustomer\PanelMainCustomer;

class ListCustomerPanels{

    private $listPanels=[];


    //// ===================================================
    ///  add Panel
    /// ====================================================

    public function __construct()
    {
        array_push($this->listPanels, new PanelMainCustomer());
    }



    //// ===================================================
    ///  options
    /// ====================================================

    public function getListPanel(){
        return $this->listPanels;
    }

    public function searchCustomerPanel($panelTitleEn){
        foreach ($this->listPanels As $itemPanel){
            if ($panelTitleEn == $itemPanel -> getTitleEn()){
                return $itemPanel;
            }
        }
        return $this->getFirstCustomerPanel();
    }

    public function getFirstCustomerPanel(){
        if (sizeof($this->listPanels) > 0){
            return $this->listPanels[0];
        }
        return false;
    }
}