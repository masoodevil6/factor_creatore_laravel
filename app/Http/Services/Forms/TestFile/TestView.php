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



}