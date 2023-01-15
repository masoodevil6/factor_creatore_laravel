<?php

namespace App\Http\Services\Forms\TestFile;


use App\Http\Services\Forms\FactorService;
use App\Repositories\ContextRepository;
use Illuminate\Support\Facades\Auth;

class FileFormTestService extends TestData
{

    private $factorService;
    private $ClassName;
    private $numProduct = 8;
    private $pageSize = "";


    public function __construct($className , $productNum=8 , $pageSize="")
    {
        parent::__construct();
        $this->factorService = new FactorService();
        $this->setClassName($className);
        $this->setNumProduct($productNum);
        $this->setPageSize($pageSize);
    }

    public function generateAndAddressDownloadFileFactor(){
        $factor = $this->readyInfoFactor();
        $this->factorService->deleteFactorsTest();

        ContextRepository::FactorRepository()->deleteResult($factor);

        return $this->addressDownloadFileFactor($factor);
    }


    ////////// ----------------------------
    private function readyInfoFactor(){
        $this->factorInfo["res_num"] = ContextRepository::FactorRepository()-> GenerateUniqueResNumFactor();
        $this->factorInfo["user_id"] = $this->getUserId();
        $this->factorInfo["form_id"] = $this->getFormId();

        $factor = ContextRepository::FactorRepository()->addResult($this->factorInfo);

        $this->readyProductsInFactor($factor);

        return ContextRepository::FactorRepository()->getResult($factor->id);
    }

    private function readyProductsInFactor($factor){
        $products = $this->readyListProductModel($this->getNumProduct());

        foreach ($products as $itemProduct){
            $itemProduct["factor_id"] = $factor->id;
            $itemProduct = $itemProduct->toArray();

            ContextRepository::FactorProductRepository()->addResult($itemProduct);
        }
    }

    private function addressDownloadFileFactor($factor){
        $this->factorService->generateFactor($factor , true , $this->getPageSize());
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




    private function getPageSize()
    {
        return $this->pageSize;
    }
    private function setPageSize($pageSize): void
    {
        $this->pageSize = $pageSize;
    }


}