<?php
namespace App\Http\Controllers\PanelCustomer\Panels\InterfacePanelCustomer;


interface IPanelTicketCustomer extends IBasePanelCustomer{

    function getListTicketSelected($ticketFolderId);

    function submitNewTicketClient($ticketCategoryId , $ticketFolderId , $title , $text);

}