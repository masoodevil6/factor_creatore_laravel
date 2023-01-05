<?php
namespace App\Http\Controllers\PanelCustomer\Panels\InterfacePanelCustomer;


interface IPanelCommentCustomer extends IBasePanelCustomer{

    function deleteUserComment($comment);

    function SendNewCommandUser($body);

}