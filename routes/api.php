<?php

use App\Http\Controllers\API\UserCommentApiController;
use App\Http\Controllers\API\UserPersonApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\LoginApiController;
use App\Http\Controllers\API\UserFactorsApiController;
use App\Http\Controllers\API\PublicApiController;
use App\Http\Controllers\API\UserFormsApiController;
use App\Http\Controllers\API\UserSubscribeApiController;
use App\Http\Controllers\API\UserTicketApiController;





Route::controller(PublicApiController::class)->group(function (){

    Route::get("/about-us" , "aboutUs");

    Route::post("/subscribe/{subscribeSlug}" , "subscribe");

    Route::post("/subscribes" , "subscribes");

    Route::get("/forms-selected" , "formsSelected");

    Route::get("/forms/{subscribeSlug?}" , "forms");

    Route::post("/comments" , "comments");

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




Route::prefix("user")->middleware("auth:api")->group(function (){

    Route::prefix("person")->controller(UserPersonApiController::class)->group(function (){

        Route::post("full-name" , "getFullNameClient");

        Route::post("info" , "getInfoClient");
        Route::post("set" , "setUserInfo");

        Route::post("send-code-verify-phone" , "sendCodeVerifyPhone");
        Route::post("send-code-verify-email" , "sendCodeVerifyEmail");
        Route::post("verify-code" , "verifyCode");

    });


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


    Route::prefix("subscribes")->controller(UserSubscribeApiController::class)->group(function (){

        Route::post("/actives" , "ListUserSubscribesActive");
    });

    Route::prefix("comments")->controller(UserCommentApiController::class)->group(function (){

        Route::post("/list" , "listComments");

        Route::post("/delete" , "deleteComment");

        Route::post("/send" , "sendComment");

        Route::post("/like-or-dislike-comment" , "likeOrDislikeComment");
    });

    Route::prefix("tickets")->controller(UserTicketApiController::class)->group(function (){

        Route::post("/send" , "sendTicket");

        Route::post("/form-send" , "formSend");

        Route::post("/list" , "listTickets");

        Route::post("/info-ticket-selected" , "infoTicketSelected");
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