<?php
namespace App\Http\Services\Forms;


use App\Models\Factors\Factor;
use App\Models\Forms\Form;
use App\Repositories\ContextRepository;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FactorService{


    public function generateFactor(Factor $factor , $isTest=false , $size=""){

        $instance = $this->getInstaceClassForm($factor->form , $factor , $isTest , $size);
        if ($instance != null){
            return $instance->ToPdf();
        }
        return null;
    }


    public function getInfoFactor(Form $form , $convertDescriptionToHtml = false){
        $instance = $this->getInstaceClassForm($form);

        if ($instance != null){
            return $instance->getTotalDataForm($convertDescriptionToHtml);
        }
        return null;
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
        $directoryFactor = ContextRepository::UserRepository()->getPathUser()
            .ContextRepository::UserRepository()->getDirectoryUserFactors();
        $fileName = $factor->res_num.".pdf";
        return $directoryFactor.$fileName;
    }

    private function getFactorTestFileName(){
        return $directoryFactor = ContextRepository::UserRepository()->getDirectoryTestFile();
    }

    private function getInstaceClassForm(Form $form , Factor $factor=null , $isTest=false , $size=""){
        $nameSpaceClass = $form->class;

        try{
            return (new \ReflectionClass($nameSpaceClass))->newInstance($factor , $isTest , $size);
        }
        catch (Exception $e){
            return null;
        }
    }

}