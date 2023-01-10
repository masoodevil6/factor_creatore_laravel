<?php

namespace App\Http\Services\Forms;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class BaseFormService extends BaseFormToolService {

    private $passPrice = " ریـال";

    protected $view = "";
    protected $data = [];
    protected $num = 8;

    public function __construct($factor)
    {
        parent::__construct($factor , $this->passPrice);

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



    public function ToPdf(){

        $factor = $this->getFactorModel();
        $products = $this->getProducts();
        $view = $this->getView();
        $data = $this->getData();
        $num = $this->getNum();

        $fileName = null;
        if (view()->exists($view)) {
            $pdf = Pdf::loadView($view , compact('factor' , "products"  , "data" , "num"));

            $fileInfo =$this->getFactorFileInfo();
            $fileLocation =  $fileInfo["fileLocation"];
            $fileName = $fileInfo["fileName"];

            Storage::disk('local')->put($fileLocation.$fileName , $pdf->download($fileName));
        }

        return $this;
    }


}