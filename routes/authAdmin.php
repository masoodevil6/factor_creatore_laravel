<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Admin\LoginAdminPanelCustomerController;


/*
|--------------------------------------------------------------------------
//// base url="auth/....."
|--------------------------------------------------------------------------
*/
Route::controller(LoginAdminPanelCustomerController::class)->group(function (){


    Route::middleware(["guest:admin" , "form.login.admin"])->group(function (){

        Route::get("form-login" , "formLogin")
            ->name("admin-auth.form-login");

        Route::post("commit-login" , "commitLogin")
            ->name("admin-auth.commit-login")
            ->middleware("throttle:admin-login-try-limiter");

    });


    Route::middleware("auth.admin")->group(function (){

        Route::get("/logout" , "logout")
            ->name("admin-auth.logout");
    });

});








