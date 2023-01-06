<?php

namespace App\Http\Controllers\PanelCustomer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PanelCustomer\Panels\ListCustomerPanels;
use App\Http\Requests\CustomerPanel\PanelImageUploadLogoRequest;
use App\Http\Requests\CustomerPanel\PanelImageUploadMohrRequest;
use Illuminate\Http\Request;

class IamgesPanelCustomerController extends BasePanelCustomerPanel
{
    public function __construct(ListCustomerPanels $listCustomerPanels)
    {
        $this->panelName = "images";
        parent::__construct($listCustomerPanels);
    }


    public function showImageLogo(){
        return $this->panel->showImageLogo();
    }
    public function uploadImageLogo(PanelImageUploadLogoRequest $request){
        $this->panel->uploadImageLogo($request->file("logo"));
        return $this->redirectPanel();
    }
    public function deleteImageLogo(){
        $this->panel->deleteImageLogo();
        return $this->redirectPanel();
    }


    public function showImageMohr(){
        return $this->panel->showImageMohr();
    }
    public function uploadImageMohr(PanelImageUploadMohrRequest $request){
        $this->panel->uploadImageMohr($request->file("mohr"));
        return $this->redirectPanel();
    }
    public function deleteImageMohr(){
        $this->panel->deleteImageMohr();
        return $this->redirectPanel();
    }



}

