<?php

namespace App\Http\Controllers\FactorCreator;

use App\Http\Controllers\Controller;
use App\Repositories\ContextRepository;
use Illuminate\Http\Request;

class FactorCompleteController extends BaseFactorController
{
    public function index(){

        $infoPage = $this->getNavProcessFactorCreator(5);
        $nav = $infoPage["nav"];
        $stepFactor = $infoPage["stepFactor"];
        ///----------------------------------------------------------------


        $resNum = ContextRepository::FactorRepository()->GenerateFactorFromTemplateFactor();

        dd($resNum);

        return view("factor-creator.complete.index" ,
            compact("nav" , "stepFactor" )
        );
    }





    ////// =======================================



}
