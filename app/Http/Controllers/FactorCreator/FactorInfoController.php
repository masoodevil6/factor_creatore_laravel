<?php

namespace App\Http\Controllers\FactorCreator;

use App\Http\Controllers\Customer\CustomerMainController;
use App\Http\Requests\FactorCreator\InfoFactorRequest;
use App\Repositories\ContextRepository;
use Illuminate\Http\Request;

class FactorInfoController extends BaseFactorController
{
    public function index(){

        $nav = [
            [
                "route" => "customer.create-factor.index" ,
                "title" => "فاکتور جدید"
            ]
        ];
        $stepFactor = 1;
        ///----------------------------------------------------------------

        $factor = $this->getFactorTemplate();
        $userStores = ContextRepository::UserStoreRepository()->GetStoresAuthUser();

        return view("factor-creator.info.index" ,
            compact("nav" , "stepFactor" , "factor" , "userStores")
        );

    }


    public function getInfoUserStore(Request $request){
        $factor = ContextRepository::UserStoreRepository()->GetInfoStoresAuthUser($request->get("user_store_id"));

        if (!empty($factor)){
            $factor->store_name = $factor -> name;
            $factor->store_phone = $factor -> phone;
            $factor->store_address = $factor -> address;
        }

        return view("factor-creator.info.info-store" ,
            compact("factor")
        )->render();
    }



    public function submitInfoFactor(InfoFactorRequest $request){
        ContextRepository::TemplateFactorRepository()->SubmitInfoTemplateFactor($request->all());
        return redirect()->route("customer.products-factor.index");
    }




}
