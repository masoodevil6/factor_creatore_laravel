<?php

use \Illuminate\Support\Facades\Config;

return [

    /*
    |--------------------------------------------------------------------------
    | panels for users
    |--------------------------------------------------------------------------
    */

    "panels"=>[
        "App\Http\Controllers\PanelCustomer\Panels\PanelCustomer\PanelMainCustomer" ,
        "App\Http\Controllers\PanelCustomer\Panels\PanelCustomer\PanelSubscribeCustomer" ,
        "App\Http\Controllers\PanelCustomer\Panels\PanelCustomer\PanelImagesCustomer" ,
        "App\Http\Controllers\PanelCustomer\Panels\PanelCustomer\PanelFactorCustomer" ,
        "App\Http\Controllers\PanelCustomer\Panels\PanelCustomer\PanelStoreCustomer" ,
        "App\Http\Controllers\PanelCustomer\Panels\PanelCustomer\PanelTicketCustomer" ,
        "App\Http\Controllers\PanelCustomer\Panels\PanelCustomer\PanelCommentCustomer" ,

    ],

];