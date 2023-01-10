<?php
namespace App\Http\Services\Forms;


use App\Models\Factors\Factor;
use App\Repositories\ContextRepository;
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
        $pathFile = ContextRepository::UserRepository()->getPathUser();
        $directoryFactor = ContextRepository::UserRepository()->getDirectoryUserFactors();
        $fileName = $factor->res_num.".pdf";
        $location = $pathFile.$directoryFactor.$fileName;

        if (Storage::exists($location)){
            return Storage::download($location);
        }
        return abort(404);
    }

}