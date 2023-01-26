<?php
namespace App\Http\Services\Forms;

use App\Repositories\ContextRepository;
class SubscribeFormService{


    public function getListCategoryAndFormSelected($formId = null , $convertDescriptionToHtml = false){

        $info = $this->getInfoPageForms($formId);

        $subscribeActives = $info["subscribeActives"];
        $formCategories = $info["formCategories"];
        $forms = $info["forms"];
        ///--------------
        $form = $info["form"];
        $formCategoryId = $info["formCategoryId"];
        ///---------------
        $infoForm = null;
        if (!empty($form) && $form !=null){
            $infoForm = $this->getInfoFactor($form , $convertDescriptionToHtml);
        }

        return compact("subscribeActives" , "formCategories" , "forms" , "form" , "formCategoryId" , "infoForm");
    }


    public function getFormsInFormCategory($form_category_id , $convertDescriptionToHtml = false){
        $subscribeActives = $this->getListSubscribeActive();
        $forms = $this->getListForms($form_category_id , $subscribeActives);

        $form = null;
        $infoForm = null;
        if (sizeof($forms)>0){
            $form = $forms[0];
            $infoForm = $this->getInfoFactor($form , $convertDescriptionToHtml);
        }

        return compact( "subscribeActives","forms" , "form" , "infoForm");
    }


    public function getInfoForm($formId , $convertDescriptionToHtml = false){
        $info = $this->returnInfoForm($formId);
        $subscribeActives = $info["subscribeActives"];
        $form = $info["form"];

        $infoForm = $this->getInfoFactor($form , $convertDescriptionToHtml);

        return compact("info" , "subscribeActives" , "form" , "infoForm");
    }


    public function endProcessSelectForm($formId){

        $resultExp = [
            "form" => null ,
            "route" => "" ,
        ];

        $info = $this->returnInfoForm($formId);
        $form = $info["form"];

        if ($form->active){
            $resultExp["form"] = $form;
        }
        else{
            $slug = ContextRepository::SubscribeRepository()->GetSlugSubscribeForm($form->subscribe_id);
            $resultExp["route"] = route("customer.subscribes.info" , $slug);
        }

        return $resultExp;
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

    private function getInfoFactor($form , $convertDescriptionToHtml = false){
        $factorService = new FactorService();
        return $factorService->getInfoFactor($form , $convertDescriptionToHtml);
    }

}