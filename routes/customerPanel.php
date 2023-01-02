<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PanelCustomer\MainPanelCustomerController;
use App\Http\Controllers\PanelCustomer\PersonalPanelCustomerController;
use App\Http\Controllers\PanelCustomer\TicketsPanelCustomerController;
use App\Http\Controllers\PanelCustomer\StoresPanelCustomerController;
use App\Http\Controllers\PanelCustomer\SubscribePanelCustomerController;
use App\Http\Controllers\PanelCustomer\FactorsPanelCustomerController;
use App\Http\Controllers\PanelCustomer\CommentPanelCustomerController;

/*
|--------------------------------------------------------------------------
| admin routes
|--------------------------------------------------------------------------
*/

Route::controller(MainPanelCustomerController::class)->group(function (){

    Route::get("/{panel?}" , "index")->name("customer-panel.home");
    Route::post("get-view-panel" , "getViewPanel")->name("customer-panel.get-view-panel");

});



/// panel persional info
Route::prefix("personal-info")->controller(PersonalPanelCustomerController::class)->group(function (){

    Route::Post("/submit-change-info" , "changeInfo")->name("customer-panel.persional-info.change-info");

    Route::Post("/send-verify-phone-or-email" , "sendVerifyPhoneOrEmail")->name("customer-panel.persional-info.send-verify-phone-or-email");

    Route::Post("/verify-phone-or-email" , "VerifyPhoneOrEmail")->name("customer-panel.persional-info.verify-phone-or-email");

});


/// panel tickets
Route::prefix("tickets")->controller(TicketsPanelCustomerController::class)->group(function (){

    Route::Post("/get-list-info-ticket" , "getListInfoTicket")->name("customer-panel.tickets-info.get-list-info-ticket");

    Route::Post("/submit-new-ticket" , "submitNewTicket")->name("customer-panel.tickets-info.submit-new-ticket");

});


/// panel stores
Route::prefix("stores")->controller(StoresPanelCustomerController::class)->group(function (){

    Route::Post("/get-info-user-store/" , "getInfoUserStores")->name("customer-panel.stores.get-info-user-store");

    Route::Post("/submit-new-user-store/{store?}" , "submitNewUserStore")->name("customer-panel.stores.submit-new-user-store");

    Route::delete("/delete-user-store/{store}" , "deleteUserStore")->name("customer-panel.stores.delete-user-store");

});


/// panel subscribes
Route::prefix("subscribes")->controller(SubscribePanelCustomerController::class)->group(function (){

    Route::Post("/get-info-user-subscribe" , "getInfoUserSubscribe")->name("customer-panel.subscribes.get-info-user-subscribe");

    Route::delete("/delete-user-subscribe/{subscribe}" , "deleteUserSubscribe")->name("customer-panel.subscribes.delete-user-subscribe");

});


/// panel subscribes
Route::prefix("factors")->controller(FactorsPanelCustomerController::class)->group(function (){

    Route::Post("/get-info-user-factor" , "getInfoUserFactor")->name("customer-panel.factors.get-info-user-factor");

    Route::get("/download-user-factor/{resNum}" , "downloadUserFactor")->name("customer-panel.factors.download-user-factor");

    Route::delete("/delete-user-factor/{resNum}" , "deleteUserFactor")->name("customer-panel.factors.delete-user-factor");

});


/// panel subscribes
Route::prefix("comments")->controller(CommentPanelCustomerController::class)->group(function (){

    Route::delete("/delete-user-comment/{comment}" , "deleteUserComment")->name("customer-panel.comments.delete-user-comment");

});






