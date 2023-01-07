<?php
namespace App\Http\Controllers\PanelCustomer\Panels\InterfacePanelCustomer;


interface IPanelImagesCustomer extends IBasePanelCustomer{
    function showImageLogo();
    function uploadImageLogo($logo);
    function deleteImageLogo();

    function showImageMohr();
    function uploadImageMohr($mohr);
    function deleteImageMohr();
}