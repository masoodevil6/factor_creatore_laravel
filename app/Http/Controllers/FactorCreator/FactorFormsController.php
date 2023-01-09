<?php

namespace App\Http\Controllers\FactorCreator;


use App\Repositories\ContextRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FactorFormsController extends BaseFactorController
{

    public function index(){

        $infoPage = $this->getNavProcessFactorCreator(4);
        $nav = $infoPage["nav"];
        $stepFactor = $infoPage["stepFactor"];
        ///----------------------------------------------------------------

        $formSelected = null;
        if (isset($_GET["form"])){
            $formSelected = $_GET["form"];
        }

        $info = $this->getInfoPageForms($formSelected);

        $subscribeActives = $info["subscribeActives"];
        $formCategories = $info["formCategories"];
        $forms = $info["forms"];
        ///--------------
        $form = $info["form"];
        $formCategoryId = $info["formCategoryId"];

        return view("factor-creator.forms.index" ,
            compact("nav" , "stepFactor" , "subscribeActives" , "formCategories" , "forms" , "form" , "formCategoryId")
        );
    }


    public function getFormsInFormCategory(Request $request){
        $subscribeActives = $this->getListSubscribeActive();
        $forms = $this->getListForms($request->get("form_category_id") , $subscribeActives);

        $form = null;
        if (sizeof($forms)>0){
            $form = $forms[0];
        }

        return [
            "forms" => view("factor-creator.forms.forms" , compact( "subscribeActives","forms" , "form"))->render(),
            "form_selected" => $this->returnViewInfoForm($form , $subscribeActives)
        ];
    }


    public function getInfoForm(Request $request){
        $info = $this->returnInfoForm($request->get("form_id"));
        $subscribeActives = $info["subscribeActives"];
        $form = $info["form"];

        return $this->returnViewInfoForm($form , $subscribeActives);
    }

    public function endProcessSelectForm(){

        if (isset($_GET["form"])){
            $info = $this->returnInfoForm($_GET["form"]);
            $form = $info["form"];
            if ($form->active){
                return redirect()->route("customer.forms-factor.index" , $_GET["form"]);
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

    protected function returnViewInfoForm($form , $subscribeActives = null){
        return view("factor-creator.home.form-info" , compact( "subscribeActives","form"))->render();
    }

    ///// ===================================================

    private function getInfoPageForms($formSelected=null){
        $subscribeActives = $this->getListSubscribeActive();

        $form= null;
        $formCategoryId = null;
        if ($formSelected != null){
            $form = ContextRepository::FormRepository()->getResult($_GET["form"]);
            if (!empty($form)){
                $form->active = $this->returnSateActiveForm($subscribeActives , $form->subscribe_id);
                $formCategoryId = $form->form_category_id;
            }
        }

        $formCategories = ContextRepository::FormCategoryRepository()->getAllResult(true);

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





}
