<?php

namespace App\Http\Controllers\PanelCustomer\Panels;

use App\Http\Controllers\PanelCustomer\Panels\PanelCustomer\PanelMainCustomer;
use Illuminate\Support\Facades\Config;
use League\Flysystem\Exception;

class ListCustomerPanels{

    private $listPanels=[];


    //// ===================================================
    ///  add Panel
    /// ====================================================

    public function __construct()
    {
        $panels = Config::get("customerPanels.panels");
        foreach ($panels as $panel){
            $this->getPanelClass($panel);
        }
    }


    private function getPanelClass($namespace){
        try{
            array_push($this->listPanels, (new \ReflectionClass($namespace))->newInstance());
        }
        catch (Exception $e){
            return null;
        }
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