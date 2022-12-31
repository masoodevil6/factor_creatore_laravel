<?php
namespace App\Http\Controllers\PanelCustomer\Panels\PanelCustomer;

use App\Http\Controllers\PanelCustomer\Panels\InterfacePanelCustomer\IPanelMainCustomer;

class PanelMainCustomer extends BasePanelCustomer implements IPanelMainCustomer {

    public function __construct()
    {
        $this->setTitleFa("حساب کاربر");
        $this->setTitleEn("personal-info");
        $this->setIcon("fa fa-user-circle-o");
    }


    public function returnPanelView()
    {
        $titleFa = $this->getTitleFa();
        $titleEn = $this->getTitleEn();

        return view("customer-panels.panels.panel-personal-info.index" , compact("titleFa" , "titleEn"))->render();

    }


}