<?php

namespace App\Http\Services\Forms;

/*use Barryvdh\DomPDF\Facade\Pdf;*/

/*use Dompdf\Dompdf;
/*use Dompdf\Options;
use Illuminate\Support\Facades\App;*/
use Illuminate\Support\Facades\Storage;

/*use Knp\Snappy\Pdf;*/

use niklasravnsborg\LaravelPdf\Facades\Pdf;

class BaseFormService extends BaseFormToolService {

    private $passPrice = " ریـال";


    public function __construct($factor , $isTestFile)
    {
        parent::__construct($factor , $this->passPrice , $isTestFile);

        if (method_exists($this , "setView")){
            $this->setView();
        }
    }





    private function getTotalInfo(){
        $this->readyListProductsInPages();

        $factor = $this->getFactorModel();
        $products = $this->getProducts();
        $productsInPage = $this->getProductsInPage();
        $totalPrice = $this->getTotalPrice();
        $view = $this->getView();
        $data = $this->getData();
        $num = $this->getNum();

        return [
            "view" => $view,
            "data" => compact('factor' , "products" , "productsInPage" , "totalPrice" , "data" , "num")
        ];
    }

    public function getViewRender(){
        $info = $this->getTotalInfo();
        $view = $info["view"];
        $data = $info["data"];

        if (view()->exists($view)) {
            return view($view , $data)->render();
        }
        return null;
    }





    public function ToPdf(){

        $view  = $this->getViewRender();
        $fileName = null;

        if ($view != null) {

            $fileInfo =$this->getFactorFileInfo();
            $fileLocation =  $fileInfo["fileLocation"];
            $fileName = $fileInfo["fileName"];

            $pdf = Pdf::loadHtml($view);

            Storage::disk('local')->put($fileLocation.$fileName , $pdf->output());

        }

        return $this;
    }


}