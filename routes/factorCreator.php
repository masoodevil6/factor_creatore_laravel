<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FactorCreator\FactorCreatorController;
use App\Http\Controllers\FactorCreator\FactorInfoController;


Route::prefix("/")->controller(FactorCreatorController::class)->group(function (){

    Route::get("/" , "index")->name("customer.create-factor.index");

    Route::post("/get-forms-in-form-category" , "getFormsInFormCategory")->name("customer.create-factor.get-forms-in-form-category");

    Route::post("/get-info-form" , "getInfoForm")->name("customer.create-factor.get-info-form");

    Route::get("/end-process-select-form" , "endProcessSelectForm")->name("customer.create-factor.end-process-select-form");

});


Route::prefix("/info")->controller(FactorInfoController::class)->group(function (){

    Route::get("/{formId}" , "index")->name("customer.info-factor.index");


});