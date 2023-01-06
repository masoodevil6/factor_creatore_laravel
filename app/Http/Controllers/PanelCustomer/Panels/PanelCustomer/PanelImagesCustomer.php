<?php
namespace App\Http\Controllers\PanelCustomer\Panels\PanelCustomer;

use App\Http\Controllers\PanelCustomer\Panels\InterfacePanelCustomer\IPanelFactorCustomer;
use App\Http\Controllers\PanelCustomer\Panels\InterfacePanelCustomer\IPanelImagesCustomer;
use App\Http\Requests\CustomerPanel\PanelImageUploadLogoRequest;
use App\Http\Requests\CustomerPanel\PanelImageUploadMohrRequest;
use App\Http\Services\Forms\BaseFormToolService;
use App\Http\Services\Forms\FactorService;
use App\Repositories\ContextRepository;

class PanelImagesCustomer extends BasePanelCustomer implements IPanelImagesCustomer {

    public function __construct()
    {
        $this->setTitleFa("لوگو و مهر");
        $this->setTitleEn("images");
        $this->setIcon("fa fa-image");
    }


    public function returnPanelView()
    {
        $titleFa = $this->getTitleFa();
        $titleEn = $this->getTitleEn();
        return view("customer-panels.panels.panel-images.index" , compact("titleFa" , "titleEn"))->render();
    }



    public function showImageLogo(){
        return ContextRepository::UserRepository()->GetImageUserLogo();
    }
    public function uploadImageLogo($logo){
        ContextRepository::UserRepository()->UploadImageUserLogo($logo);
    }
    public function deleteImageLogo(){
        return ContextRepository::UserRepository()->DeleteImageUserLogo();
    }



    public function showImageMohr(){
        return ContextRepository::UserRepository()->GetImageUserMohr();
    }
    public function uploadImageMohr($mohr){
        ContextRepository::UserRepository()->UploadImageUserMohr($mohr);
    }
    public function deleteImageMohr(){
        return ContextRepository::UserRepository()->DeleteImageUserMohr();
    }


}

//asset(Auth::user()->logo["indexArray"][Auth::user()->logo["currentImage"]])