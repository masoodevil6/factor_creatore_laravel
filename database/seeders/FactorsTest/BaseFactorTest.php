<?php

namespace Database\Seeders\FactorsTest;

use App\Http\Services\Forms\FactorService;
use App\Repositories\ContextRepository;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class BaseFactorTest extends Seeder
{
    private $product = [
        "name" => "کالا",
        "num" => 10,
        "unit" => "عدد ",
        "price" => 10000,
        "off" => 5000,
        "factor_id" => null,
    ];
    private $numProduct = 8;


    private $userId = 1;
    private $formId;
    protected $ClassName;

    private $factorService;
    public function __construct()
    {
        $this->factorService = new FactorService();
    }





    protected function generateFileFactor(){
        $factor = $this->readyInfoFactor();

        $this->readyProductsInFactor($factor);

        $factor = ContextRepository::FactorRepository()->getResult($factor->id);

        $this->readyFileFactor($factor);

        $this->downloadFileFactor($factor);

        //$this->deleteFileFactorTest($factor);

    }

    private function readyInfoFactor(){
        $userPath = ContextRepository::UserRepository()->getPathUser();
        $directoryLogo = ContextRepository::UserRepository()->getDirectoryUserLogo();
        $directoryMohr = ContextRepository::UserRepository()->getDirectoryUserMohr();


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

            "logo_name" => $userPath.$directoryLogo."test.png" ,
            "mohr_name" => $userPath.$directoryMohr."test.png" ,
        ];

        return ContextRepository::FactorRepository()->addResult($factorInfo);
    }

    private function readyProductsInFactor($factor){
        $product = $this->getProduct();
        $product["factor_id"] = $factor->id;

        for ($i=0; $i< $this->getNumProduct(); $i++){
            ContextRepository::FactorProductRepository()->addResult($product);
        }
    }

    private function readyFileFactor($factor){
        $this->factorService->generateFactor($factor);
    }

    private function downloadFileFactor($factor){
        $this->factorService->downloadFactor($factor);
    }

    private function deleteFileFactorTest($factor){
        $this->factorService->deleteFactor($factor);

        ContextRepository::FactorRepository()->deleteResult($factor);
    }








    ///// ---------------------------------------------------

    private function getClassName()
    {
        return $this->ClassName;
    }

    protected function setClassName($ClassName): void
    {
        $this->ClassName = $ClassName;
    }




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
        return $this->userId;
    }

    protected function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }



    private function getNumProduct(): int
    {
        return $this->numProduct;
    }

    protected function setNumProduct(int $numProduct): void
    {
        $this->numProduct = $numProduct;
    }




    private function getProduct(): array
    {
        return $this->product;
    }






}
