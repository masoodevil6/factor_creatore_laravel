<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\LoginApiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix("login")->controller(LoginApiController::class)->group(function (){

    // G2AWgZo8BzuRzjUnY2nlbSALbaQTX3cY0Ddffxjgcpo8tzxtpENry23vtXVa

    Route::middleware("throttle:customer-login-register-limiter")
        ->post("/check-last-login" , "checkTokenAndEmail");

    Route::middleware("throttle:customer-login-register-limiter")
        ->post("/register" , "registerEmailOrPhoneClient");

    Route::middleware("throttle:customer-login-confirm-limiter")
        ->post("/confirm-login" , "ConfirmLoginClient");

    Route::middleware("throttle:customer-login-resend-limiter")
        ->post("/ready-and-validator-token" ,  "ReadyAndValidatorRequestToken");

    Route::middleware("throttle:customer-login-resend-limiter")
        ->post("/resend-otp-token" ,  "ResendMessageTokenClient");

});










Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


