<?php
namespace App\Http\Services\Forms;

use App\Http\Services\Forms\ModelServices\FactorModel;
use App\Http\Services\Forms\ModelServices\ProductModel;
use App\Repositories\ContextRepository;

class BaseFormToolService{

    private $passPrice;

    private $factor;
    private $factorModel;
    private $products = [];
    private $totalPrice = 0;

    private $factorRes = 0;
    private $userId = 0;

    public function __construct($factor , $passPrice = null)
    {
        $this->factor = $factor;
        if (!empty($passPrice)){
            $this->passPrice = $passPrice;
        }
        else{
            $this->passPrice = ContextRepository::FactorRepository()->GetStandardPassPrice();
        }

        $this->readyFactorModel();
        $this->readyListFactorProductsModel();
    }

    private function readyFactorModel()
    {

        $this->factorModel = new FactorModel();

        $this->factorModel->setId($this->factor->id );
        $this->factorModel->setResNum($this->factor->res_num);
        $this->factorModel->setDescription($this->factor->description);
        $this->factorRes = $this->factor->res_num;

        $this->factorModel->setCreatedAt($this->factor->created_at);
        $this->factorModel->setUpdatedAt($this->factor->updated_at);

        $this->factorModel->setStoreName($this->factor->store_name);
        $this->factorModel->setStorePhone($this->factor->store_phone);
        $this->factorModel->setStoreAddress($this->factor->store_address);

        $this->factorModel->setCustomerName($this->factor->customer_name);
        $this->factorModel->setCustomerPhone($this->factor->customer_phone);
        $this->factorModel->setCustomerAddress($this->factor->customer_address);

        $this->factorModel->setFileName($this->factor->file_name);
        $this->factorModel->setLogoName($this->factor->logo_name);
        $this->factorModel->setMohrName($this->factor->mohr_name);

        $form = $this->factor->form;

        $this->factorModel->setFormId($form->id);
        $this->factorModel->setFormName($this->factor->form->name);

        $user = $this->factor->user;
        $this->userId = $user->id;
        $this->factorModel->setUserId($user->id);
        $this->factorModel->setUserName($user->fullName);
    }

    private function readyListFactorProductsModel()
    {
        foreach ($this->factor->products as $keyProduct => $itemProduct){
            $productModel = new ProductModel($this->passPrice);
            $productModel->setProductId($itemProduct->id);
            $productModel->setProductName($itemProduct->name);
            $productModel->setProductNum($itemProduct->num);
            $productModel->setProductUnit($itemProduct->unit);
            $productModel->setProductPrice($itemProduct->price);
            $productModel->setProductOff($itemProduct->off);
            array_push($this->products , $productModel);

            $this->totalPrice += $productModel->getProductTotalPrice();
        }
    }






    public function getFactorModel()
    {
        return $this->factorModel;
    }

    public function getProducts(): array
    {
        return $this->products;
    }

    public function getTotalPrice()
    {
        return persianPriceFormat($this->totalPrice).$this->passPrice;
    }

    public function getFactorFileInfo()
    {
        return [
            "fileLocation" => "users/".$this->userId."/factors/" ,
            "fileName" => $this->factorRes.".pdf" ,
        ];
    }
}