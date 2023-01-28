<?php

$c = "App\Http\Services\Admins\PanelGroups\AdminGroup";

return[

    "groups"=>[
        [
            "group_class" => App\Http\Services\Admins\PanelGroups\AdminGroup\CreatePanelGroupAdmin::class ,
            "group_name" => "admin" ,
        ],
        [
            "group_class" => App\Http\Services\Admins\PanelGroups\AppGroup\CreatePanelGroupApp::class ,
            "group_name" => "app" ,
        ],
        [
            "group_class" => App\Http\Services\Admins\PanelGroups\BankGroup\CreatePanelGroupBank::class ,
            "group_name" => "bank" ,
        ],
        [
            "group_class" => App\Http\Services\Admins\PanelGroups\FactorGroup\CreatePanelGroupFactor::class ,
            "group_name" => "factor" ,
        ],
        [
            "group_class" => App\Http\Services\Admins\PanelGroups\FormGroup\CreatePanelGroupForm::class ,
            "group_name" => "form" ,
        ],
        [
            "group_class" => App\Http\Services\Admins\PanelGroups\PublicGroup\CreatePanelGroupPublic::class ,
            "group_name" => "public" ,
        ],
        [
            "group_class" => App\Http\Services\Admins\PanelGroups\SubscribeGroup\CreatePanelGroupSubscribe::class ,
            "group_name" => "subscribe" ,
        ],
        [
            "group_class" => App\Http\Services\Admins\PanelGroups\TicketGroup\CreatePanelGroupTicket::class ,
            "group_name" => "ticker" ,
        ],
        [
            "group_class" => App\Http\Services\Admins\PanelGroups\UserGroup\CreatePanelGroupUser::class ,
            "group_name" => "user" ,
        ],
    ],




    "panels"=>[

        ////=======================================================
        /// admin
        ////=======================================================
        [
            "group_name" => "admin" ,
            "panel_class" => App\Http\Services\Admins\AdminsPanelGroups\AdminGroup\CreatePanelPanelsInPanelGroupAdmin::class ,
            "panel_name" => "panels"
        ],
        [
            "group_name" => "admin" ,
            "panel_class" => App\Http\Services\Admins\AdminsPanelGroups\AdminGroup\CreatePanelUserAdminInPanelGroupAdmin::class ,
            "panel_name" => "users"
        ],



        ////=======================================================
        /// app
        ////=======================================================
        [
            "group_name" => "app" ,
            "panel_class" => App\Http\Services\Admins\PanelGroups\AppGroup\CreatePanelAppCategoryInPanelGroupApp::class ,
            "panel_name" => "categories"
        ],
        [
            "group_name" => "app" ,
            "panel_class" => App\Http\Services\Admins\PanelGroups\AppGroup\CreatePanelAppFileInPanelGroupApp::class ,
            "panel_name" => "files"
        ],
        [
            "group_name" => "app" ,
            "panel_class" => App\Http\Services\Admins\PanelGroups\AppGroup\CreatePanelAppFileLinkInPanelGroupApp::class ,
            "panel_name" => "links"
        ],



        ////=======================================================
        /// app
        ////=======================================================
        [
            "group_name" => "bank" ,
            "panel_class" => App\Http\Services\Admins\PanelGroups\BankGroup\CreatePanelBankInPanelGroupBank::class ,
            "panel_name" => "categories"
        ],



        ////=======================================================
        /// factor
        ////=======================================================
        [
            "group_name" => "factor" ,
            "panel_class" => App\Http\Services\Admins\PanelGroups\FactorGroup\CreatePanelFactorsInPanelGroupFactor::class ,
            "panel_name" => "factors"
        ],



        ////=======================================================
        /// form
        ////=======================================================
        [
            "group_name" => "form" ,
            "panel_class" => App\Http\Services\Admins\PanelGroups\FormGroup\CreatePanelFormCategoryPanelGroupForm::class ,
            "panel_name" => "categories"
        ],
        [
            "group_name" => "form" ,
            "panel_class" => App\Http\Services\Admins\PanelGroups\FormGroup\CreatePanelFormPanelGroupForm::class ,
            "panel_name" => "forms"
        ],



        ////=======================================================
        /// form
        ////=======================================================
        [
            "group_name" => "public" ,
            "panel_class" =>  App\Http\Services\Admins\PanelGroups\PublicGroup\CreatePanelSettingSitePanelGroupPublic::class ,
            "panel_name" => "settings"
        ],
        [
            "group_name" => "public" ,
            "panel_class" =>  App\Http\Services\Admins\PanelGroups\PublicGroup\CreatePanelUnitGroupPublic::class ,
            "panel_name" => "units"
        ],



        ////=======================================================
        /// subscribe
        ////=======================================================
        [
            "group_name" => "subscribe" ,
            "panel_class" =>  App\Http\Services\Admins\PanelGroups\SubscribeGroup\CreatePanelSubscribePanelGroupSubscribe::class ,
            "panel_name" => "subscribes"
        ],
        [
            "group_name" => "subscribe" ,
            "panel_class" =>  App\Http\Services\Admins\PanelGroups\SubscribeGroup\CreatePanelSubscribePaymentsPanelGroupSubscribe::class ,
            "panel_name" => "payments"
        ],



        ////=======================================================
        /// ticket
        ////=======================================================
        [
            "group_name" => "ticket" ,
            "panel_class" =>  App\Http\Services\Admins\PanelGroups\TicketGroup\CreatePanelTicketCategoryInPanelGroupUser::class ,
            "panel_name" => "categories"
        ],
        [
            "group_name" => "ticket" ,
            "panel_class" =>  App\Http\Services\Admins\PanelGroups\TicketGroup\CreatePanelTicketInPanelGroupUser::class ,
            "panel_name" => "tickets"
        ],



        ////=======================================================
        /// user
        ////=======================================================
        [
            "group_name" => "user" ,
            "panel_class" =>  App\Http\Services\Admins\PanelGroups\UserGroup\CreatePanelCommentPanelGroupUser::class ,
            "panel_name" => "comments"
        ],
        [
            "group_name" => "user" ,
            "panel_class" =>  App\Http\Services\Admins\PanelGroups\UserGroup\CreatePanelUserPanelGroupUser::class ,
            "panel_name" => "users"
        ],
        [
            "group_name" => "user" ,
            "panel_class" =>  App\Http\Services\Admins\PanelGroups\UserGroup\CreatePanelUserStorePanelGroupUser::class ,
            "panel_name" => "stores"
        ],
    ],

];