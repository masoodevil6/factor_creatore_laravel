<?php

namespace App\Http\Controllers\FactorCreator;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerPanel\PanelImageUploadLogoRequest;
use App\Http\Requests\CustomerPanel\PanelImageUploadMohrRequest;
use App\Http\Requests\FactorCreator\InfoImageFactorRequest;
use App\Repositories\ContextRepository;
use Illuminate\Http\Request;

class FactorImageController extends BaseFactorController
{
    public function index(){

        $infoPage = $this->getNavProcessFactorCreator(3);
        $nav = $infoPage["nav"];
        $stepFactor = $infoPage["stepFactor"];
        ///----------------------------------------------------------------

        $factor = $this->getFactorTemplate();

        $userLogo = ContextRepository::UserRepository()->CheckExistImageUserLogo();
        $userMohr = ContextRepository::UserRepository()->CheckExistImageUserMohr();

        return view("factor-creator.images.index" ,
            compact(
                "nav" , "stepFactor" , "factor" , "userLogo" , "userMohr" )
        );
    }




    public function getTemplateLogoImage(){
        return ContextRepository::TemplateFactorRepository()->GetTemplateImageUserLogo();
    }

    public function deleteTemplateLogoImage(){
        ContextRepository::TemplateFactorRepository()->DeleteTemplateImageUserLogo();
        return redirect()->back();
    }

    public function uploadTemplateLogoImage(PanelImageUploadLogoRequest $request){
        ContextRepository::TemplateFactorRepository()->UploadTemplateImageUserLogo($request->file("logo_name"));
        return redirect()->back();
    }





    public function getTemplateMohrImage(){
        return ContextRepository::TemplateFactorRepository()->GetTemplateImageUserMohr();
    }

    public function deleteTemplateMohrImage(){
        ContextRepository::TemplateFactorRepository()->DeleteTemplateImageUserMohr();
        return redirect()->back();
    }

    public function uploadTemplateMohrImage(PanelImageUploadMohrRequest $request){
        ContextRepository::TemplateFactorRepository()->UploadTemplateImageUserMohr($request->file("mohr_name"));
        return redirect()->back();
    }





    public function goToNextStepProcess(InfoImageFactorRequest $request){
        ContextRepository::TemplateFactorRepository()->SetTypeLogoAndMohrImageInTemplateFactor($request->get("type_logo_name") , $request->get("type_mohr_name"));
        return redirect()->route("customer.forms-factor.index");
    }

    //// =========================================


}
