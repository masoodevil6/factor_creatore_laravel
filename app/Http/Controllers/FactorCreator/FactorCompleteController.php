<?php

namespace App\Http\Controllers\FactorCreator;

use App\Http\Controllers\Controller;
use App\Http\Services\Forms\FactorService;
use App\Repositories\ContextRepository;
use Illuminate\Http\Request;

class FactorCompleteController extends BaseFactorController
{
    public function index(FactorService $factorService){

        $infoPage = $this->getNavProcessFactorCreator(5);
        $nav = $infoPage["nav"];
        $stepFactor = $infoPage["stepFactor"];
        ///----------------------------------------------------------------

        $factor = ContextRepository::FactorRepository()->GenerateFactorFromTemplateFactor();

        $factor = $factorService->generateFactor($factor);

        return view("factor-creator.complete.index" ,
            compact("nav" , "stepFactor" , "factor")
        );


        /*if ($factor == null){
            return redirect()->route("customer.forms-factor.index");
        }
        else{

        }*/
    }



}
