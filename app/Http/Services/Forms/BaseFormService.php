<?php

namespace App\Http\Services\Forms;

use Illuminate\Support\Facades\Storage;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class BaseFormService extends BaseFormToolService {

    private $passPrice = " ریـال";

    protected $view = "";
    protected $data = [];
    protected $num = 8;

    public function __construct($factor , $isTestFile)
    {
        parent::__construct($factor , $this->passPrice , $isTestFile);

        if (method_exists($this , "setView")){
            $this->setView();
        }
    }



    protected function getView()
    {
        return $this->view;
    }

    protected function getData(): array
    {
        return $this->data;
    }

    protected function getNum(): int
    {
        return $this->num;
    }

    private function getTotalInfo(){
        $factor = $this->getFactorModel();
        $products = $this->getProducts();
        $view = $this->getView();
        $data = $this->getData();
        $num = $this->getNum();

        return [
            "view" => $view,
            "data" => compact('factor' , "products"  , "data" , "num")
        ];
    }

    public function getViewRender(){
        $info = $this->getTotalInfo();
        $view = $info["view"];
        $data = $info["data"];
        return view($view , $data)->render();
    }





    public function ToPdf(){

        $info = $this->getTotalInfo();
        $view = $info["view"];
        $data = $info["data"];

        $fileName = null;
        if (view()->exists($view)) {

            $fileInfo =$this->getFactorFileInfo();
            $fileLocation =  $fileInfo["fileLocation"];
            $fileName = $fileInfo["fileName"];

            $pdf = Pdf::loadView($view , $data);

            Storage::disk('local')->put($fileLocation.$fileName , $pdf->output());
        }

        return $this;
    }


}