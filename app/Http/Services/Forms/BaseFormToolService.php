<?php
namespace App\Http\Services\Forms;

use App\Http\Services\Forms\ModelServices\FactorModel;
use App\Http\Services\Forms\ModelServices\ProductModel;
use App\Repositories\ContextRepository;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

class BaseFormToolService{

    protected $factor;
    private $factorModel;
    private $products = [];
    private $productsInPage = [];
    private $totalPrice = 0;

    private $factorRes = 0;
    private $userId = 0;

    private $isTestFile = false;
    private $data = [];
    private $view = "";
    private $description;

    private $infoPages =[
        [
            "orientation" => "" ,
            "size" => "A4" ,
            "num" => 8
        ]
    ];
    private $infoPage=[];


    private $passPrice = " ریـال";


    public function __construct($factor , $passPrice="" , $isTestFile=false , $pageSize="")
    {
        if ($factor != null){
            $this->setFactor($factor);
            $this->readyFactorModel();
            $this->readyListFactorProductsModel();
        }

        $this->isTestFile = $isTestFile;

        if (!empty($passPrice)){
            $this->passPrice = $passPrice;
        }
        else{
            $this->passPrice = ContextRepository::FactorRepository()->GetStandardPassPrice();
        }

        $this->setPageSelected($pageSize);
    }





    protected function setFactor($factor){
        $this->factor = $factor;


    }
    public function getFactorModel()
    {
        return $this->factorModel;
    }



    private function getInfoPageForm()
    {
        return $this->infoPage;
    }
    private function setInfoPageForm($infoPageForm)
    {
        $this->infoPage = $infoPageForm;
    }
    protected function getValidValuePageForm(){
        $infoPage = $this->getInfoPageForm();

        $size = "A4";
        if (isset($infoPage["size"])){
            $size = $infoPage["size"];
        }

        $orientation = Config::get("forms.vertical");
        if (isset($infoPage["orientation"])){
            $orientation = $infoPage["orientation"];
        }

        return [
            "size" => $size,
            "orientation" => $orientation,
        ];

    }






    protected function setInfoPagesForm($infoPages){
        $this->infoPages = $infoPages;
    }
    protected function getInfoPagesForm(){
        return $this->infoPages;
    }



    protected function setViewForm($view)
    {
        $this->view = $view;
    }
    protected function getViewForm()
    {
        return $this->view;
    }



    protected function setDataForm($data)
    {
        $this->data = $data;
    }
    protected function getDataForm(): array
    {
        return $this->data;
    }


    protected function setDescriptionForm($description)
    {
        $this->description = $description;
    }
    protected function getDescriptionForm()
    {
        return $this->description;
    }



    public function getProducts(): array
    {
        return $this->products;
    }

    public function getProductsInPage(): array
    {
        return $this->productsInPage;
    }

    public function getTotalPrice()
    {
        return persianPriceFormat($this->totalPrice).$this->passPrice;
    }


    public function getInfoPages(): array
    {
        return $this->infoPages;
    }








    public function getFactorFileInfo()
    {
        $resultExp = [
            "fileLocation" => "",
            "fileName" => $this->factorRes.".pdf",
        ];

        if ($this->isTestFile){
            $resultExp["fileLocation"] = ContextRepository::UserRepository()->getDirectoryTestFile();
        }
        else{
            $resultExp["fileLocation"] = ContextRepository::UserRepository()->getPathUser().ContextRepository::UserRepository()->getDirectoryUserFactors();
        }

        return $resultExp;
    }


    private function setPageSelected($pageSize){
        foreach ($this->infoPages As $itemInfo){
            if (isset($itemInfo["size"]["name"]) && $itemInfo["size"]["name"] == $pageSize){
                $this->setInfoPageForm($itemInfo);
                break;
            }
        }

        if ( (empty($this->infoPage) || $this->infoPage == null) && sizeof($this->infoPages)){
            $this->setInfoPageForm($this->infoPages["0"]);
        }
    }



    protected function readyDataModels(){

        $this->readyListProductsInPages();
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

        $this->factorModel->setLogoName($this->factor->logo_name);
        $this->factorModel->setMohrName($this->factor->mohr_name);



        $form = $this->factor->form;

        $this->factorModel->setFormId($form->id);
        $this->factorModel->setFormName($this->factor->form->name);


        if ($this->isTestFile && !empty($this->factor->user)){
            $user = $this->factor->user;
            $this->userId = $user->id;
            $this->factorModel->setUserId($user->id);
            $this->factorModel->setUserName($user->fullName);
        }

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

    private function readyListProductsInPages(){
        $infoPage = $this->getInfoPageForm();
        $num = $infoPage["num"];

        $resultInPage = [
            "page" => 1,
            "products" => []
        ];
        foreach ($this->products as $key => $itemPoroduct){
            $itemPoroduct->key_page = $key+1;
            array_push($resultInPage["products"] , $itemPoroduct);

            if (($key+1) % $num == 0){
                array_push($this->productsInPage , $resultInPage);
                $resultInPage["products"] = [];
                $resultInPage["page"] ++;
            }

            if ($key == sizeof($this->products) - 1 && sizeof($resultInPage["products"]) > 0){
                array_push($this->productsInPage , $resultInPage);
            }
        }
    }






    public function getTotalDataForm(){
        return [
            "page"=>$this->getInfoPages() ,
            "description" => $this->getDescriptionForm(),
        ];
    }




}