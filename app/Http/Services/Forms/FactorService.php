<?php
namespace App\Http\Services\Forms;


use App\Models\Factors\Factor;
use Illuminate\Support\Facades\Storage;

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


    public function downloadFactor(Factor $factor){
        $location = "users/".$factor->user_id."/factors/".$factor->res_num.".pdf";
        if (Storage::exists($location)){
            return Storage::download($location);
        }
        return abort(404);
    }

}