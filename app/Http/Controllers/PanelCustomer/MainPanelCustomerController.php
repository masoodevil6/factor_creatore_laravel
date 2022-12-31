<?php

namespace App\Http\Controllers\PanelCustomer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainPanelCustomerController extends BasePanelCustomerPanel
{

    public function index($panel=""){

        $panelSelected = $this->getPanelView($panel);
        $panelView = $panelSelected["view"];
        $panelTitle = $panelSelected["titleEn"];

        return view("customer-panels.index" ,
            compact( "panel" , "panelView" , "panelTitle" , "panel")
        );
    }

    public function getViewPanel(Request $request){

        $panelName = $request->get("panel_name");

        return $this->getPanelView($panelName);
    }








    private function getPanelView($panel=""){
        if ($panel !=""){
            $panelClass = $this->listCustomerPanels->searchCustomerPanel($panel);
        }
        else{
            $panelClass = $this->listCustomerPanels->getFirstCustomerPanel();
        }

        return  [
            "view" => $panelClass-> returnPanelView() ,
            "titleEn" => $panelClass-> getTitleEn()
        ];
    }
}
