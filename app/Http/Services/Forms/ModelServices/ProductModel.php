<?php
namespace App\Http\Services\Forms\ModelServices;

class ProductModel{

    private $passPrice;

    private $productId;

    private $productName;

    private $productNum;
    private $productUnit;

    private $productPrice;
    private $productOff;


    public function __construct($passPrice="")
    {
        $this->passPrice = $passPrice;
    }


    public function getProductId()
    {
        return $this->productId;
    }
    public function setProductId($productId): void
    {
        $this->productId = $productId;
    }



    public function getProductName()
    {
        return $this->productName;
    }
    public function setProductName($productName): void
    {
        $this->productName = $productName;
    }





    public function getProductNum()
    {
        return $this->productNum;
    }
    public function setProductNum($productNum): void
    {
        $this->productNum = $productNum;
    }


    public function getProductUnit()
    {
        return $this->productUnit;
    }
    public function setProductUnit($productUnit): void
    {
        $this->productUnit = $productUnit;
    }


    public function getProductNumUnitText()
    {
        return $this->getProductNum()." ".$this->getProductUnit();
    }




    public function getProductPrice()
    {
        return $this->productPrice;
    }
    public function getProductPriceText()
    {
        return persianPriceFormat($this->getProductPrice()).$this->passPrice;
    }
    public function setProductPrice($productPrice): void
    {
        $this->productPrice = $productPrice;
    }





    public function getProductOff()
    {
        return $this->productOff;
    }
    public function getProductOffText()
    {
        return persianPriceFormat($this->getProductOff()).$this->passPrice;
    }
    public function setProductOff($productOff): void
    {
        $this->productOff = $productOff;
    }








    public function getProductTotalPrice()
    {
        return ($this->getProductPrice() - $this->getProductOff())*$this->getProductNum();
    }

    public function getProductTotalPriceText()
    {
        return persianPriceFormat($this->getProductTotalPrice()).$this->passPrice;
    }




}