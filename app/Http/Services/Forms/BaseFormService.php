<?php

namespace App\Http\Services\Forms;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

use niklasravnsborg\LaravelPdf\Facades\Pdf;

class BaseFormService extends BaseFormToolService {

    /*
     *  setInfoPages()
     *  setView()
     *  setData()
    */
    private $passPrice = " ریـال";

    public function __construct($factor=null , $isTestFile=false , $pageSize="")
    {
        if ($factor != null){
            $this->setFactor($factor);
        }

        $this->readyDataConstructForm();

        parent::__construct($this->passPrice , $isTestFile , $pageSize);
    }

    private function readyDataConstructForm(){
        if (method_exists($this , "setInfoPages")){
            $this->setInfoPagesForm($this->setInfoPages());
        }
        if (method_exists($this , "setView")){
            $this->setViewForm($this->setView());
        }
        if (method_exists($this , "setData")){
            $this->setDataForm($this->setData());
        }
        if (method_exists($this , "setDescription")){
            $this->setDescriptionForm($this->setDescription());
        }
    }


    private function getTotalInfo(){
        $this->readyDataModels();

        $factor = $this->getFactorModel();
        $products = $this->getProducts();
        $productsInPage = $this->getProductsInPage();
        $totalPrice = $this->getTotalPrice();

        $data = $this->getDataForm();
        $view = $this->getViewForm();

        $infoPage = $this->getValidValuePageForm();
        $size = $infoPage["size"];
        $orientation = $infoPage["orientation"];

        $appName = Config::get('app.name');

        return [
            "size" => $size,
            "orientation" => $orientation,
            "view" => $view,
            "data" => compact('factor' , "products" , "productsInPage" , "totalPrice" , "data" , "size" , "appName" )
        ];
    }

    public function getViewRender(){
        $info = $this->getTotalInfo();
        $view = $info["view"];
        $data = $info["data"];
        $size = $info["size"];
        $orientation = $info["orientation"];


        if (view()->exists($view)) {
            return [
                "view" => view($view , $data)->render() ,
                "size" => $size ,
                "orientation" => $orientation ,
            ];
        }
        return null;
    }





    public function ToPdf(){

        $viewInfo  = $this->getViewRender();
        $fileName = null;

        if ($viewInfo != null) {

            $fileInfo =$this->getFactorFileInfo();
            $fileLocation =  $fileInfo["fileLocation"];
            $fileName = $fileInfo["fileName"];

            $pdf = Pdf::loadHtml(
                $viewInfo["view"]
                , [
                    "format" => $viewInfo["size"]["name"] ,
                    "orientation" => $viewInfo["orientation"]
                ]
            );

            Storage::disk('local')->put($fileLocation.$fileName , $pdf->output());
        }

        return $this;
    }


}