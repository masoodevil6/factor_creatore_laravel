<?php
namespace App\Http\Services\Forms;


use App\Models\Factors\Factor;
use App\Repositories\ContextRepository;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class FactorService{


    public function generateFactor(Factor $factor , $isTest=false){

        $nameSpaceClass = $factor->form->class;

        try{
            $instance = (new \ReflectionClass($nameSpaceClass))->newInstance($factor , $isTest);
            return $instance->ToPdf();
        }
        catch (Exception $e){
            return null;
        }
    }





    public function downloadFactor(Factor $factor){
        $location = $this->getFactorFileName($factor);
        if (Storage::exists($location)){
            return Storage::download($location);
        }
        return abort(404);
    }

    public function downloadFactorTest($resNum){
        $location = $this->getFactorTestFileName()."$resNum".".pdf";
        if (Storage::exists($location)){
            return Storage::download($location);
        }
        return abort(404);
    }





    public function deleteFactor(Factor $factor){
        $location = $this->getFactorFileName($factor);

        if (Storage::exists($location)){
            Storage::delete($location);
        }
    }


    public function deleteFactorsTest(){
        Storage::deleteDirectory(ContextRepository::UserRepository()->getDirectoryTestFile());
    }








    ///// ==============================
    private function getFactorFileName($factor ){
        $directoryFactor = ContextRepository::UserRepository()->getPathUser().ContextRepository::UserRepository()->getDirectoryUserFactors();
        $fileName = $factor->res_num.".pdf";
        return $directoryFactor.$fileName;
    }

    private function getFactorTestFileName(){
        return $directoryFactor = ContextRepository::UserRepository()->getDirectoryTestFile();;
    }

}