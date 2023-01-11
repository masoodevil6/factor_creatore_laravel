<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Home\HomeAdminController;
use App\Http\Controllers\Admin\Password\PasswordAdminController;

use App\Http\Controllers\Admin\Panel\PanelAdminController;
use App\Http\Controllers\Admin\Panel\UserAdminController;
use App\Http\Controllers\Admin\Publics\PublicSettingAdminController;
use App\Http\Controllers\Admin\Publics\UnitAdminController;
use App\Http\Controllers\Admin\Form\FormCategoryController;
use App\Http\Controllers\Admin\Users\UserStoreAdminController;
use App\Http\Controllers\Admin\Form\FormController;
use App\Http\Controllers\Admin\Factor\FactorAdminController;
use App\Http\Controllers\Admin\Users\UserCommentAdminController;
use App\Http\Controllers\Admin\Tickets\TicketCategoriesAdminController;
use App\Http\Controllers\Admin\Tickets\TicketsAdminController;
use App\Http\Controllers\Admin\Banks\BackAdminController;
use App\Http\Controllers\Admin\Subscribes\SubscribesAdminController;
use App\Http\Controllers\Admin\Subscribes\SubscribePaymentsAdminController;
use App\Http\Controllers\Admin\Users\UserController;



Route::namespace("Password")->prefix("password")->controller(PasswordAdminController::class)->group(function (){

    Route::get("change" , "changePassword")->name("admin.password.change-password");

    Route::Post("change" , "sendTokenForChangePassword")->name("admin.password.send-token");

    Route::get("request/{token}" , "getRequestTokenForChangePassword")->name("admin.password.get-request-token");

});





/// =================================================
/// Home Page Admin
/// =================================================
Route::namespace("Home")->group(function (){

    Route::prefix("home")->controller(HomeAdminController::class)->group(function (){

        Route::get("/" , "index")->name("admin.home");

    });

});




/// =================================================
/// admin Panel
/// =================================================

Route::namespace("Panel")->group(function (){

    Route::prefix("admin")->controller(PanelAdminController::class)->group(function (){

        Route::get("/" , "index")->name("admin.panel.admin.index");

        Route::get("/create" , "create")->name("admin.panel.admin.create");
        Route::post("/store" , "store")->name("admin.panel.admin.store");

        Route::get("/edit/{admin}" , "edit")->name("admin.panel.admin.edit");
        Route::post("/update/{admin}" , "update")->name("admin.panel.admin.update");

        Route::get("/panels/{admin}" , "panels")->name("admin.panel.admin.panels");
        Route::post("/store-panels/{admin}" , "storePanels")->name("admin.panel.admin.storePanels");

        Route::delete("/destroy/{admin}" ,  "destroy")->name("admin.panel.admin.destroy");

        Route::post("/status/{admin}" , "status")->name("admin.panel.admin.status");
    });

    Route::prefix("user-admin")->controller(UserAdminController::class)->group(function (){

        Route::get("/" , "index")->name("admin.panel.user-admin.index");

        Route::get("/create" , "create")->name("admin.panel.user-admin.create");
        Route::post("/store" , "store")->name("admin.panel.user-admin.store");

        Route::get("/edit/{user:email}" , "edit")->name("admin.panel.user-admin.edit");
        Route::put("/update/{user:email}" , "update")->name("admin.panel.user-admin.update");

        Route::delete("/destroy/{user:email}" ,  "destroy")->name("admin.panel.user-admin.destroy");

        Route::post("/status/{user:email}" , "status")->name("admin.panel.user-admin.status");
    });
});





/// =================================================
/// public setting
/// =================================================

Route::namespace("Publics")->group(function (){

    Route::prefix("setting")->controller(PublicSettingAdminController::class)->group(function (){

        Route::get("/" , "index")->name("admin.public.setting.index");
        Route::post("/update" , "update")->name("admin.public.setting.update");

    });


    Route::prefix("unit")->controller(UnitAdminController::class)->group(function (){

        Route::get("/" , "index")->name("admin.public.unit.index");

        Route::get("/create" , "create")->name("admin.public.unit.create");
        Route::post("/store" , "store")->name("admin.public.unit.store");

        Route::get("/edit/{unit}" , "edit")->name("admin.public.unit.edit");
        Route::put("/update/{unit}" , "update")->name("admin.public.unit.update");

        Route::delete("/destroy/{unit}" ,  "destroy")->name("admin.public.unit.destroy");

    });

});






/// =================================================
/// form panel
/// =================================================


Route::namespace("Factor")->controller(FactorAdminController::class )->group(function (){

    Route::prefix("factor")->group(function (){

        Route::get("/" , "index")->name("admin.factors.factor.index");

        Route::get("/show/{factor}" , "show")->name("admin.factors.factor.show");
        Route::post("/change-form/{factor}" , "changeForm")->name("admin.factors.factor.change-form");

        Route::delete("/destroy/{factor}" ,  "destroy")->name("admin.factors.factor.destroy");

        Route::post("/status/{factor}" , "status")->name("admin.factors.factor.status");

        Route::get("/download/{factor}" , "download")->name("admin.factors.factor.download");

    });

});




/// =================================================
/// form panel
/// =================================================

Route::namespace("Form")->group(function (){

    Route::prefix("form-category")->controller(FormCategoryController::class)->group(function (){

        Route::get("/" , "index")->name("admin.forms.form-category.index");

        Route::get("/create" , "create")->name("admin.forms.form-category.create");
        Route::post("/store" , "store")->name("admin.forms.form-category.store");

        Route::get("/edit/{formCategory}" , "edit")->name("admin.forms.form-category.edit");
        Route::put("/update/{formCategory}" , "update")->name("admin.forms.form-category.update");

        Route::delete("/destroy/{formCategory}" ,  "destroy")->name("admin.forms.form-category.destroy");

        Route::post("/status/{formCategory}" , "status")->name("admin.forms.form-category.status");

    });


    Route::prefix("form")->controller(FormController::class)->group(function (){

        Route::get("/" , "index")->name("admin.forms.form.index");

        Route::get("/create" , "create")->name("admin.forms.form.create");
        Route::post("/store" , "store")->name("admin.forms.form.store");

        Route::get("/edit/{form}" , "edit")->name("admin.forms.form.edit");
        Route::put("/update/{form}" , "update")->name("admin.forms.form.update");

        Route::get("/test-file/{form?}" , "testFile")->name("admin.forms.form.test-file");
        Route::post("/submit-test-file" , "submitTestFile")->name("admin.forms.form.submit-test-file");
        Route::get("/download-test-file/{resNum}/{time}" , "downloadTestFile")->name("admin.forms.form.download-test-file");

        Route::delete("/destroy/{form}" ,  "destroy")->name("admin.forms.form.destroy");

        Route::post("/status/{form}" , "status")->name("admin.forms.form.status");

        Route::post("/selected/{form}" , "selected")->name("admin.forms.form.selected");

    });


});






/// =================================================
/// user panel
/// =================================================

Route::namespace("Users")->group(function (){

    Route::prefix("user")->controller(UserController::class)->group(function (){

        Route::get("/" , "index")->name("admin.users.user.index");

        Route::get("/show/{user}" , "show")->name("admin.users.user.show");
        Route::post("/update/{user}" , "changeInfo")->name("admin.users.user.change-info");

        Route::post("/status/{user}" , "status")->name("admin.users.user.status");

    });


    Route::prefix("user-store")->controller(UserStoreAdminController::class)->group(function (){

        Route::get("/" , "index")->name("admin.users.user-store.index");

        Route::get("/create" , "create")->name("admin.users.user-store.create");
        Route::post("/store" , "store")->name("admin.users.user-store.store");

        Route::get("/edit/{userStore}" , "edit")->name("admin.users.user-store.edit");
        Route::put("/update/{userStore}" , "update")->name("admin.users.user-store.update");

        Route::delete("/destroy/{userStore}" ,  "destroy")->name("admin.users.user-store.destroy");

    });


    Route::prefix("comments")->controller(UserCommentAdminController::class)->group(function (){

        Route::get("/" , "index")->name("admin.users.comment.index");

        Route::get("/admin-answer/{comment}" , "adminAnswer")->name("admin.users.comment.adminAnswer");
        Route::post("/store-answer/{comment}" , "storeAnswer")->name("admin.users.comment.storeAnswer");

        Route::get("/edit/{comment}" , "edit")->name("admin.users.comment.edit");
        Route::post("/update/{comment}" , "update")->name("admin.users.comment.update");

        Route::delete("/destroy/{comment}" ,  "destroy")->name("admin.users.comment.destroy");

        Route::post("/status/{comment}" , "status")->name("admin.users.comment.status");
        Route::post("/approved/{comment}" , "approved")->name("admin.users.comment.approved");
    });

});






/// =================================================
/// user panel
/// =================================================

Route::namespace("Tickets")->group(function (){


    Route::prefix("ticket-categories")->controller(TicketCategoriesAdminController::class)->group(function (){

        Route::get("/" , "index")->name("admin.tickets.ticket-category.index");

        Route::get("/create" , "create")->name("admin.tickets.ticket-category.create");
        Route::post("/store" , "store")->name("admin.tickets.ticket-category.store");

        Route::get("/edit/{ticketCategory}" , "edit")->name("admin.tickets.ticket-category.edit");
        Route::put("/update/{ticketCategory}" , "update")->name("admin.tickets.ticket-category.update");

        Route::delete("/destroy/{ticketCategory}" ,  "destroy")->name("admin.tickets.ticket-category.destroy");

        Route::post("/status/{ticketCategory}" , "status")->name("admin.tickets.ticket-category.status");
    });


    Route::prefix("tickets")->controller(TicketsAdminController::class)->group(function (){
        Route::get("/" , "index")->name("admin.tickets.ticket.index");

        Route::get("/answer/{ticketFolder}" , "answer")->name("admin.tickets.ticket.answer");
        Route::post("/submit-answer/{ticketFolder}" , "submitAnswer")->name("admin.tickets.ticket.submit-answer");
        Route::post("/change-status/{ticketFolder}" , "changeStatusTicket")->name("admin.tickets.ticket.change-status");

    });


});




/// =================================================
/// bank panel
/// =================================================

Route::namespace("Banks")->group(function (){


    Route::prefix("banks")->controller(BackAdminController::class)->group(function (){

        Route::get("/" , "index")->name("admin.banks.bank.index");

        Route::get("/create" , "create")->name("admin.banks.bank.create");
        Route::post("/store" , "store")->name("admin.banks.bank.store");

        Route::get("/edit/{back}" , "edit")->name("admin.banks.bank.edit");
        Route::put("/update/{back}" , "update")->name("admin.banks.bank.update");

        Route::delete("/destroy/{back}" ,  "destroy")->name("admin.banks.bank.destroy");

        Route::post("/status/{back}" , "status")->name("admin.banks.bank.status");
    });

});




/// =================================================
/// User Page Admin
/// =================================================

Route::namespace("Subscribes")->group(function (){

    Route::prefix("subscribes")->controller(SubscribesAdminController::class)->group(function (){

        Route::get("/" , "index")->name("admin.subscribes.subscribe.index");

        Route::get("/create" , "create")->name("admin.subscribes.subscribe.create");
        Route::post("/store" , "store")->name("admin.subscribes.subscribe.store");

        Route::get("/edit/{subscribe}" , "edit")->name("admin.subscribes.subscribe.edit");
        Route::put("/update/{subscribe}" , "update")->name("admin.subscribes.subscribe.update");

        Route::delete("/destroy/{subscribe}" ,  "destroy")->name("admin.subscribes.subscribe.destroy");

        Route::post("/status/{subscribe}" , "status")->name("admin.subscribes.subscribe.status");

        Route::post("/selected/{subscribe}" , "selected")->name("admin.subscribes.subscribe.selected");

    });

    Route::prefix("payments")->controller(SubscribePaymentsAdminController::class)->group(function (){

        Route::get("/" , "index")->name("admin.subscribes.subscribe-payment.index");

        Route::get("/show/{subscribePayment}" , "show")->name("admin.subscribes.subscribe-payment.show");

        Route::get("/create" , "create")->name("admin.subscribes.subscribe-payment.create");
        Route::post("/store" , "store")->name("admin.subscribes.subscribe-payment.store");

        Route::get("/edit/{subscribePayment}" , "edit")->name("admin.subscribes.subscribe-payment.edit");
        Route::put("/update/{subscribePayment}" , "update")->name("admin.subscribes.subscribe-payment.update");

        Route::delete("/destroy/{subscribePayment}" ,  "destroy")->name("admin.subscribes.subscribe-payment.destroy");

    });

});
