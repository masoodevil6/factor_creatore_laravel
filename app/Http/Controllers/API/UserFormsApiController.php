<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Services\Forms\SubscribeFormService;
use Illuminate\Http\Request;

class UserFormsApiController extends Controller
{
    /*
  * ====================================
  *  url=> /user/forms/list-category-and-forms
  *====================================
  *
  * ====================================
  * object subscribes and payments
  */
    public function ListCategoryAndForms(Request $request , SubscribeFormService $subscribeFormService){
        $formId = null;
        if (isset($request->formId) && $request->formId > 0){
            $formId = $request->formId;
        }
        return $subscribeFormService->getListCategoryAndFormSelected($formId , true);
    }




    /*
     * ====================================
     *  url=> /user/forms/list-forms-in-category
     *====================================
     * post => FormCategoryId
     * ====================================
     * object factors
     */
    public function ListFormsInCategory(Request $request , SubscribeFormService $subscribeFormService){
        return $subscribeFormService->getFormsInFormCategory($request->FormCategoryId , true);
    }




    /*
     * ====================================
     *  url=> /user/forms/info-form-selected
     *====================================
     * post => formId
     * ====================================
     * object info factor
     */
    public function InfoFormSelected(Request $request , SubscribeFormService $subscribeFormService){
        return $subscribeFormService->getInfoForm($request->formId , true);
    }




    /*
     * ====================================
     *  url=> /user/forms/check-form-for-create-factor
     *====================================
     * post => formId
     * ====================================
     * ["form" => null , "route" => "" ]
     */
    public function CheckFormForCreateFactor(Request $request , SubscribeFormService $subscribeFormService){
        return $subscribeFormService->endProcessSelectForm($request->formId);
    }


}
