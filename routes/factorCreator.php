<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FactorCreator\FactorFormsController;
use App\Http\Controllers\FactorCreator\FactorInfoController;
use App\Http\Controllers\FactorCreator\FactorProductsController;
use App\Http\Controllers\FactorCreator\FactorImageController;




Route::prefix("/info")->controller(FactorInfoController::class)->group(function (){

    Route::get("/{resNum?}" , "index")->name("customer.create-factor.index");

    Route::post("/get-info-user-store" , "getInfoUserStore")->name("customer.create-factor.get-info-user-store");

    Route::Post("submit-info-factor/{resNum?}","submitInfoFactor")->name("customer.create-factor.submit-info-factor");

});

Route::prefix("/products")->controller(FactorProductsController::class)->group(function (){

    Route::get("/" , "index")->name("customer.products-factor.index");

    Route::Post("/get-info-factor-product" , "getInfoFactorProduct")->name("customer.products-factor.get-info-factor-product");

    Route::Post("/delete-factor-product/{templateFactorProductId}" , "deleteFactorProduct")->name("customer.products-factor.delete-factor-product");

    Route::Post("/add-factor-product" , "addFactorProduct")->name("customer.products-factor.add-factor-product");

    Route::get("/go-to-next-step-process" , "goToNextStepProcess")->name("customer.products-factor.go-to-next-step-process");

});

Route::prefix("/images")->controller(FactorImageController::class)->group(function (){

    Route::get("/" , "index")->name("customer.images-factor.index");

});







Route::prefix("/forms")->controller(FactorFormsController::class)->group(function (){

    Route::get("/" , "index")->name("customer.forms-factor.index");

    Route::post("/get-forms-in-form-category" , "getFormsInFormCategory")->name("customer.forms-factor.get-forms-in-form-category");

    Route::post("/get-info-form" , "getInfoForm")->name("customer.forms-factor.get-info-form");

    Route::get("/end-process-select-form" , "endProcessSelectForm")->name("customer.forms-factor.end-process-select-form");

});