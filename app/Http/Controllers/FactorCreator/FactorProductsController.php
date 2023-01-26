<?php

namespace App\Http\Controllers\FactorCreator;

use App\Http\Controllers\Controller;
use App\Http\Requests\FactorCreator\InfoFactorProductRequest;
use App\Repositories\ContextRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class FactorProductsController extends BaseFactorController
{


    public function index(){

        $infoPage = $this->getNavProcessFactorCreator(2);
        $nav = $infoPage["nav"];
        $stepFactor = $infoPage["stepFactor"];
        ///----------------------------------------------------------------

        $factorInfo = $this->getTotalInfoProduct();
        $factor = $factorInfo["factor"];
        $products = $factorInfo["products"];
        $totalPrice = $factorInfo["total_price"];
        $totalPriceText = $factorInfo["total_price_text"];

        $units = $this->getListUnit();

        $passPrice = $this->getStandardPassPrice();


        return view("factor-creator.products.index" ,
            compact("nav" , "stepFactor" , "factor" , "products" , "totalPrice" , "totalPriceText" , "units" , "passPrice")
        );
    }


    public function getInfoFactorProduct(Request $request){
        $product = ContextRepository::TemplateFactorProductRepository()->GetInfoFactorProduct($request->get("template_factor_product_id"));
        $units = $this->getListUnit();
        $passPrice = $this->getStandardPassPrice();
        return view(
            "factor-creator.products.info-product" ,
            compact("product" , "units" ,  "passPrice")
        )->render();
    }

    public function deleteFactorProduct($templateFactorProductId){
        ContextRepository::TemplateFactorProductRepository()->DeleteFactorProduct($templateFactorProductId);
        return redirect()->back();
    }

    public function addFactorProduct(InfoFactorProductRequest $request){
        ContextRepository::TemplateFactorProductRepository()->AddFactorProduct($request->all());
        return redirect()->back();
    }


    public function goToNextStepProcess(){
        $factorInfo = $this->getTotalInfoProduct();
        if (sizeof($factorInfo["products"]) > 0){
            return redirect()->route("customer.images-factor.index");
        }
        else{
            return redirect()->back();
        }
    }




    ///---------------------------

    private function getListUnit(){
        return ContextRepository::UnitRepository()->getAllResult(true);
    }

    protected function getStandardPassPrice(){
        return  Config::get("app.passPrice");
    }

}
