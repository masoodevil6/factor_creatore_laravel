<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PanelCustomer\MainPanelCustomerController;
use App\Http\Controllers\PanelCustomer\PersonalPanelCustomerController;

/*
|--------------------------------------------------------------------------
| admin routes
|--------------------------------------------------------------------------
*/

Route::controller(MainPanelCustomerController::class)->group(function (){

    Route::get("/{panel?}" , "index")->name("customer-panel.home");
    Route::post("get-view-panel" , "getViewPanel")->name("customer-panel.get-view-panel");

});



Route::prefix("panel")->group(function (){

    /// panel persional info
    Route::prefix("persional-info")->controller(PersonalPanelCustomerController::class)->group(function (){

        Route::Post("/submit-change-info" , "changeInfo")->name("customer-panel.persional-info.change-info");

        /*Route::Post("/send-verify-phone-or-email" , "sendVerifyPhoneOrEmail")->name("customer-panel.persional-info.send-verify-phone-or-email");

        Route::Post("/verify-phone-or-email" , "VerifyPhoneOrEmail")->name("customer-panel.persional-info.verify-phone-or-email");*/

    });




});






