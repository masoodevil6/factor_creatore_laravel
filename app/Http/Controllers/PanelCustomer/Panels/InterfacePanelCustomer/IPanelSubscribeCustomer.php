<?php
namespace App\Http\Controllers\PanelCustomer\Panels\InterfacePanelCustomer;


interface IPanelSubscribeCustomer extends IBasePanelCustomer{

    function getInfoUserSubscribe($userSubscribeId);

    function deleteUserSubscribe($userSubscribeId=0);

}