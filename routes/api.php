<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\LoginApiController;



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








Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




/*Route::fallback(function (){

    return response()->json(
        [
            "status" => 200 ,
            "msg" => "err"
        ]
    );

});*/