<?php
namespace App\Http\Services\Forms\TestFile;


use App\Models\Factors\Factor;
use App\Models\Factors\FactorProduct;
use Illuminate\Database\Eloquent\Collection;

class TestView extends TestData
{

    public function testModel($form){
        $nameSpaceClass = $form->class;

        $view = null;
        $factor = $this->readyFactorModel($form , 8);

        try{
            $instance = (new \ReflectionClass($nameSpaceClass))->newInstance($factor , true);
            return $instance->getViewRender();
        }
        catch (Exception $e){
            return null;
        }
    }


    private function readyFactorModel($form , $num){
        $factor = new Factor();

        $factor-> form_id = $form->id;
        $factor-> user_id = 0;

        $factor-> res_num = $this->factorInfo["res_num"];
        $factor-> description = $this->factorInfo["description"];

        $factor-> store_name = $this->factorInfo["store_name"];
        $factor-> store_phone = $this->factorInfo["store_phone"];
        $factor-> store_address = $this->factorInfo["store_address"];

        $factor-> customer_name = $this->factorInfo["customer_name"];
        $factor-> customer_phone = $this->factorInfo["customer_phone"];
        $factor-> customer_address = $this->factorInfo["customer_address"];

        $factor-> logo_name = $this->factorInfo["logo_name"];
        $factor-> mohr_name = $this->factorInfo["mohr_name"];

        $factor-> products = $this->readyListProductModel($num);

        return $factor;
    }


}