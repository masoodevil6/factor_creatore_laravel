<?php
namespace App\Http\Controllers\PanelCustomer\Panels\InterfacePanelCustomer;


interface IPanelFactorCustomer extends IBasePanelCustomer{
    function getInfoUserFactor($userFactorResNum);
    function downloadUserFactor($userFactorResNum);
    function deleteUserFactor($userFactorResNum);
}