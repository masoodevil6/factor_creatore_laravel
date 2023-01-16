<?php

namespace App\Http\Services\Forms\TestFile;

use App\Http\Services\Forms\FactorService;
use App\Repositories\ContextRepository;

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
        return $this->addressDownloadFileFactor($factor);
    }

    ////////// ----------------------------
    private function readyInfoFactor(){
        $this->factorInfo["res_num"] = randomNumFromBetweenNumber();
        $this->factorInfo["id"] = $this->getFormId();
        return $this->readyFactorModel($this->factorInfo , $this->getNumProduct());
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