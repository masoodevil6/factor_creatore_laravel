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



Route::namespace("Password")->prefix("password")->controller(PasswordAdminController::class)->group(function (){

    Route::get("change" , "changePassword")->name("admin.password.change-password");

    Route::Post("change" , "sendTokenForChangePassword")->name("admin.password.send-token");

    Route::get("request/{requestChangePassword:token}" , "getRequestTokenForChangePassword")->name("admin.password.get-request-token");

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

        Route::delete("/destroy/{form}" ,  "destroy")->name("admin.forms.form.destroy");

        Route::post("/status/{form}" , "status")->name("admin.forms.form.status");

    });


});






/// =================================================
/// user panel
/// =================================================

Route::namespace("Users")->group(function (){

    Route::prefix("user")->group(function (){

        Route::get("/" , function (){})->name("admin.users.user.index");

    });


    Route::prefix("user-store")->controller(UserStoreAdminController::class)->group(function (){


        Route::get("/" , "index")->name("admin.users.user-store.index");

        Route::get("/create" , "create")->name("admin.users.user-store.create");
        Route::post("/store" , "store")->name("admin.users.user-store.store");

        Route::get("/edit/{userStore}" , "edit")->name("admin.users.user-store.edit");
        Route::put("/update/{userStore}" , "update")->name("admin.users.user-store.update");

        Route::delete("/destroy/{userStore}" ,  "destroy")->name("admin.users.user-store.destroy");

    });


    /*Route::prefix("comments")->controller(UserCommentAdminController::class)->group(function (){

        Route::get("/" , "index")->name("admin.user.comments.index");

        Route::get("/admin-answer/{comment}" , "adminAnswer")->name("admin.user.comments.adminAnswer");
        Route::post("/store-answer/{comment}" , "storeAnswer")->name("admin.user.comments.storeAnswer");

        Route::get("/edit/{comment}" , "edit")->name("admin.user.comments.edit");
        Route::post("/update/{comment}" , "update")->name("admin.user.comments.update");

        Route::delete("/destroy/{comment}" ,  "destroy")->name("admin.user.comments.destroy");

        Route::post("/status/{comment}" , "status")->name("admin.user.comments.status");
        Route::post("/approved/{comment}" , "approved")->name("admin.user.comments.approved");
    });


    Route::prefix("ticket-categories")->controller(TicketCategoriesAdminController::class)->group(function (){

        Route::get("/" , "index")->name("admin.user.ticket-categories.index");

        Route::get("/create" , "create")->name("admin.user.ticket-categories.create");
        Route::post("/store" , "store")->name("admin.user.ticket-categories.store");

        Route::get("/edit/{ticketCategory}" , "edit")->name("admin.user.ticket-categories.edit");
        Route::put("/update/{ticketCategory}" , "update")->name("admin.user.ticket-categories.update");

        Route::delete("/destroy/{ticketCategory}" ,  "destroy")->name("admin.user.ticket-categories.destroy");

        Route::post("/status/{ticketCategory}" , "status")->name("admin.user.ticket-categories.status");
    });


    Route::prefix("tickets")->controller(TicketsAdminController::class)->group(function (){
        Route::get("/" , "index")->name("admin.user.tickets.index");

        Route::get("/answer/{ticketFolder}" , "answer")->name("admin.user.tickets.answer");
        Route::post("/submit-answer/{ticketFolder}" , "submitAnswer")->name("admin.user.tickets.submit-answer");
        Route::post("/change-status/{ticketFolder}" , "changeStatusTicket")->name("admin.user.tickets.change-status");

    });*/



});





