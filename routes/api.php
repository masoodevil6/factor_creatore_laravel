<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\LoginApiController;
use App\Http\Controllers\API\UserFactorsApiController;
use App\Http\Controllers\API\PublicApiController;
use App\Http\Controllers\API\UserFormsApiController;





Route::controller(PublicApiController::class)->group(function (){

    Route::get("/about-us" , "aboutUs");

    Route::get("/forms/{subscribeSlug?}" , "forms");

    Route::get("/subscribes" , "subscribes");

});



Route::prefix("login")->controller(LoginApiController::class)->group(function (){

    Route::middleware("throttle:check-last-login-client")
        ->post("/check-last-login" , "checkTokenAndEmail");

    Route::middleware("throttle:customer-login-register-limiter")
        ->post("/register" , "registerEmailOrPhoneClient");

    Route::middleware("throttle:customer-login-confirm-limiter")
        ->post("/confirm-login" , "ConfirmLoginClient");

    Route::middleware("throttle:customer-login-resend-limiter")
        ->post("/resend-otp-token" ,  "ResendMessageTokenClient");

});




Route::prefix("user")->middleware("api.login")->group(function (){

    Route::prefix("factors")->controller(UserFactorsApiController::class)->group(function (){

        Route::post("/search" , "searchUserFactors");

        Route::post("/delete" , "deleteUserFactors");

        Route::post("/download/" , "downloadUserFactors");

        Route::post("/request-create-factor" , "RequestCreateFactor");

    });


    Route::prefix("forms")->controller(UserFormsApiController::class)->group(function (){

        Route::post("/list-category-and-forms" , "ListCategoryAndForms");

        Route::post("/list-forms-in-category" , "ListFormsInCategory");

        Route::post("/info-form-selected" , "InfoFormSelected");

        Route::post("/check-form-for-create-factor" , "CheckFormForCreateFactor");

    });
});









/*Route::fallback(function (){

    return response()->json(
        [
            "status" => 200 ,
            "msg" => "err"
        ]
    );

});*/