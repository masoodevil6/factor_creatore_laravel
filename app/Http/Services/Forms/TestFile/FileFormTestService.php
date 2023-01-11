<?php

namespace App\Http\Services\Forms\TestFile;


use App\Http\Services\Forms\FactorService;
use App\Repositories\ContextRepository;
use Illuminate\Support\Facades\Auth;

class FileFormTestService
{

    private $product = [
        "name" => "کالا",
        "num" => 10,
        "unit" => "عدد ",
        "price" => 10000,
        "off" => 5000,
        "factor_id" => null,
    ];

    private $factorService;
    private $ClassName;
    private $numProduct = 8;


    public function __construct($className , $productNum)
    {
        $this->factorService = new FactorService();
        $this->setClassName($className);
        $this->setNumProduct($productNum);
    }

    public function generateAndAddressDownloadFileFactor(){
        $factor = $this->readyInfoFactor();
        $this->factorService->deleteFactorsTest();

        ContextRepository::FactorRepository()->deleteResult($factor);

        return $this->addressDownloadFileFactor($factor);
    }


    ////////// ----------------------------
    private function readyInfoFactor(){
        $factorInfo = [
            "res_num" => ContextRepository::FactorRepository()-> GenerateUniqueResNumFactor() ,
            "description" => "توضیحات تکمیلی" ,
            "status" => 1 ,

            "store_name" => "عنوان فروشگاه" ,
            "store_phone" => "09301110000" ,
            "store_address" => "آدرس فروشگاه" ,

            "customer_name" => "نام مشتری" ,
            "customer_phone" => "09300001111" ,
            "customer_address" => "آدرس مشتری" ,

            "user_id" => $this->getUserId() ,
            "form_id" => $this->getFormId() ,

            "logo_name" => ContextRepository::UserRepository()->getFileTestLogo() ,
            "mohr_name" => ContextRepository::UserRepository()->getFileTestMohr() ,
        ];



        $factor = ContextRepository::FactorRepository()->addResult($factorInfo);

        $this->readyProductsInFactor($factor);

        return ContextRepository::FactorRepository()->getResult($factor->id);
    }

    private function readyProductsInFactor($factor){
        $product = $this->getProduct();
        $product["factor_id"] = $factor->id;

        for ($i=0; $i< $this->getNumProduct(); $i++){
            ContextRepository::FactorProductRepository()->addResult($product);
        }
    }

    private function addressDownloadFileFactor($factor){
        $this->factorService->generateFactor($factor , true);
        return $factor->res_num;
    }




    ///// ---------------------------------------------------

    private function getFormId()
    {
        $form = ContextRepository::FormRepository()->SearchFromFromClassName($this->getClassName()) ;
        if (!empty($form)){
            return $form->id;
        }
        return null;
    }


    private function getUserId(): int
    {
        return Auth::id();
    }


    private function getProduct(): array
    {
        return $this->product;
    }


    private function getClassName()
    {
        return $this->ClassName;
    }
    private function setClassName($ClassName): void
    {
        $this->ClassName = $ClassName;
    }


    private function getNumProduct(): int
    {
        return $this->numProduct;
    }
    private function setNumProduct(int $numProduct): void
    {
        $this->numProduct = $numProduct;
    }


}