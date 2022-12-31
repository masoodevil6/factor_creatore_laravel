<?php
namespace App\Http\Controllers\PanelCustomer\Panels\InterfacePanelCustomer;


interface IPanelMainCustomer extends IBasePanelCustomer{

    function submitPersionalInfoClient($userName , $userFamily);

    function sendVerifyCode($type , $input);

    function verifyCodeGet($token , $code);

}