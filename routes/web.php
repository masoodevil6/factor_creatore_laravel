<?php

use App\Http\Controllers\Customer\CustomerSitemapController;
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

Route::prefix("/")->controller(CustomerAboutUsController::class)->group(function (){

    Route::get("/about-us" , "aboutUs")->name("customer.about-us");

    Route::get("/download-apps" , "downloadApp")->name("customer.about-us-download");

});


Route::prefix("/subscribe")->controller(CustomerSubscribesController::class)->group(function (){

    Route::get("/list" , "list")->name("customer.subscribes.list");

    Route::get("/info/{subscribe_slug}" , "info")->name("customer.subscribes.info");

});


Route::prefix("/sitemap")->controller(CustomerSitemapController::class)->group(function (){

    Route::get("/" , "index")->name("customer.subscribes.index");

    Route::get("/urls/{fileName}" , "urls")->name("customer.subscribes.info");

});



