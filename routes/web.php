<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\CustomerHomeController;
use App\Http\Controllers\Customer\CustomerAboutUsController;
use App\Http\Controllers\Customer\FactorCreatorController;
use App\Http\Controllers\Customer\CustomerSubscribesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix("/")->controller(CustomerHomeController::class)->group(function (){

    Route::get("/" , "home")->name("customer.home");

});

Route::prefix("/about-us")->controller(CustomerAboutUsController::class)->group(function (){

    Route::get("/" , "aboutUs")->name("customer.about-us");

});


Route::prefix("/subscribe")->controller(CustomerSubscribesController::class)->group(function (){

    Route::get("/list" , "list")->name("customer.subscribes.list");

    Route::get("/info/{subscribe_slug}" , "info")->name("customer.subscribes.info");

});





