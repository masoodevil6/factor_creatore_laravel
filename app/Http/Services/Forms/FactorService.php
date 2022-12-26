<?php
namespace App\Http\Services\Forms;


use App\Models\Factors\Factor;

class FactorService{


    public function generateFactor(Factor $factor){

        $nameSpaceClass = $factor->form->class;

        try{
            $instance = (new \ReflectionClass($nameSpaceClass))->newInstance($factor);
            return $instance->ToPdf();
        }
        catch (Exception $e){
            return null;
        }
    }

}