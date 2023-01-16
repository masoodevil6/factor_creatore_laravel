<?php

namespace App\Http\Controllers\FactorCreator;


use App\Http\Services\Forms\FactorService;
use App\Repositories\ContextRepository;
use Illuminate\Http\Request;
use function Symfony\Component\Finder\size;

class FactorFormsController extends BaseFactorController
{

    public function index(){

        $infoPage = $this->getNavProcessFactorCreator(4);
        $nav = $infoPage["nav"];
        $stepFactor = $infoPage["stepFactor"];
        ///----------------------------------------------------------------

        $factor = $this->getFactorTemplate();

        $info = $this->getInfoPageForms($factor->form_id);

        $subscribeActives = $info["subscribeActives"];
        $formCategories = $info["formCategories"];
        $forms = $info["forms"];
        ///--------------
        $form = $info["form"];
        $formCategoryId = $info["formCategoryId"];
        ///---------------
        $infoForm = null;
        if (!empty($form) && $form !=null){
            $infoForm = $this->getInfoFactor($form);
        }

        return view("factor-creator.forms.index" ,
            compact("nav" , "stepFactor" , "subscribeActives" , "formCategories" , "forms" , "form" , "formCategoryId" , "infoForm")
        );
    }


    public function getFormsInFormCategory(Request $request){
        $subscribeActives = $this->getListSubscribeActive();
        $forms = $this->getListForms($request->get("form_category_id") , $subscribeActives);

        $form = null;
        $infoForm = null;
        if (sizeof($forms)>0){
            $form = $forms[0];
            $infoForm = $this->getInfoFactor($form);
        }


        return [
            "forms" => view("factor-creator.forms.forms" , compact( "subscribeActives","forms" , "form"))->render(),
            "form_selected" => $this->returnViewInfoForm($form , $subscribeActives , $infoForm)
        ];
    }


    public function getInfoForm(Request $request){
        $info = $this->returnInfoForm($request->get("form_id"));
        $subscribeActives = $info["subscribeActives"];
        $form = $info["form"];

        $infoForm = $this->getInfoFactor($form);

        return $this->returnViewInfoForm($form , $subscribeActives , $infoForm);
    }

    public function endProcessSelectForm(Request $request){

        $formId= $request->get("form");
        if (isset($formId)){
            $info = $this->returnInfoForm($formId);
            $form = $info["form"];

            $size = $request->get("size");

            if ($form->active){
                ContextRepository::TemplateFactorRepository()->SetFormTemplateFactor($form->id , $size);
                return redirect()->route("customer.complete-factor.index");
            }
            else{
                $slug = ContextRepository::SubscribeRepository()->GetSlugSubscribeForm($form->subscribe_id);
                if ($slug != null){
                    return redirect()->route("customer.subscribes.info" , $slug);
                }
            }
        }
        else{
            return redirect()->route("customer.create-factor.index");
        }
    }




    ///// ===================================================

    private function returnViewInfoForm($form , $subscribeActives = null , $infoForm=null){
        return view("factor-creator.forms.form-info" , compact( "subscribeActives","form" , "infoForm"))->render();
    }

    ///// ===================================================

    private function getInfoPageForms($formSelected=null){
        $subscribeActives = $this->getListSubscribeActive();

        $form= null;
        $formCategoryId = null;
        if ($formSelected != null){
            $form = ContextRepository::FormRepository()->getResult($formSelected);
            if (!empty($form)){
                $form->active = $this->returnSateActiveForm($subscribeActives , $form->subscribe_id);
                $formCategoryId = $form->form_category_id;
            }
        }


        $formCategories = ContextRepository::FormCategoryRepository()->getAllResult(true);
        if ($formCategoryId == null && sizeof($formCategories) > 0){
            $formCategoryId = $formCategories[0]->id;
        }


        $forms = $this->getListForms($formCategoryId , $subscribeActives);

        return [
            "subscribeActives" => $subscribeActives,
            "formCategories" => $formCategories,
            "forms" => $forms,
            ///--------------------
            "form" => $form ,
            "formCategoryId" => $formCategoryId ,
        ];
    }


    private function getListForms($form_category_id , $subscribeActives){
        $forms = ContextRepository::FormRepository()->GetListForms($form_category_id);
        foreach ($forms as $key=> $itemForm){
            $forms[$key]->active = ContextRepository::FormRepository()->SetStateActiveForm($subscribeActives , $itemForm->subscribe_id);
        }
        return $forms;
    }


    protected function getListSubscribeActive(){
        return ContextRepository::SubscribePaymentRepository()->GetSubscribeActiveNow();
    }

    protected function returnInfoForm($formId , $subscribeActives=null){
        if ($subscribeActives == null){
            $subscribeActives = $this->getListSubscribeActive();
        }
        $form = ContextRepository::FormRepository()->getResult($formId , true);
        $form->active = $this->returnSateActiveForm($subscribeActives , $form->subscribe_id);
        return [
            "subscribeActives" => $subscribeActives ,
            "form" => $form
        ];
    }

    protected function returnSateActiveForm($subscribeActives , $subscribe_id){
        return ContextRepository::FormRepository()->SetStateActiveForm($subscribeActives , $subscribe_id);
    }


    private function getInfoFactor($form){
        $factorService = new FactorService();
        return $factorService->getInfoFactor($form);
    }


}
