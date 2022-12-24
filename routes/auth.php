<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\Customer\LoginClientPanelCustomerController;

/*
|--------------------------------------------------------------------------
//// base url="auth/....."
|--------------------------------------------------------------------------
*/

Route::controller(LoginClientPanelCustomerController::class)->group(function (){

    Route::middleware("guest")->group(function (){

        Route::get("/login-register" , "loginRegisterForm")
            ->name("auth.customer.loginRegisterForm");

        Route::middleware("throttle:customer-login-register-limiter")
            ->post("/login-register" , "loginRegister")
            ->name("auth.customer.loginRegister");

        Route::get("/login-confirm/{token}" , "loginConfirmForm")
            ->name("auth.customer.loginConfirmForm");

        Route::middleware("throttle:customer-login-confirm-limiter")
            ->post("/login-confirm/{token}" ,  "loginConfirm")
            ->name("auth.customer.loginConfirm");

        Route::middleware("throttle:customer-login-resend-limiter")
            ->post("/resend-otp-token/{token}" ,  "resendToken")
            ->name("auth.customer.resendToken");

    });

    Route::middleware("auth")->group(function (){

        Route::get("/logout" , "logout")
            ->name("auth.customer.logout");
    });

});





