<?php
namespace App\Http\Controllers\PanelCustomer\Panels\PanelCustomer;

use App\Http\Controllers\PanelCustomer\Panels\InterfacePanelCustomer\IPanelMainCustomer;
use App\Http\Controllers\PanelCustomer\Panels\InterfacePanelCustomer\IPanelTicketCustomer;
use App\Http\Services\Messages\Email\Emails;
use App\Http\Services\Messages\SMS\SMSs;
use App\Http\Services\RedirectRoute\RedirectRouteService;
use App\Repositories\ContextRepository;

class PanelTicketCustomer extends BasePanelCustomer implements IPanelTicketCustomer {

    public function __construct()
    {
        $this->setTitleFa("تیکت ها");
        $this->setTitleEn("tickets");
        $this->setIcon("fa fa-envelope-square");
    }


    public function returnPanelView()
    {
        $titleFa = $this->getTitleFa();
        $titleEn = $this->getTitleEn();

        $ticketFolders = ContextRepository::TicketFolderRepository()->GetAllTicketFolderAuthUser();
        $ticketCategory = ContextRepository::TicketCategoryRepository()->getAllResult(true);
        return view("customer-panels.panels.panel-tickets.index" , compact("titleFa" ,"titleEn", "ticketFolders" , "ticketCategory"))->render();
    }

    public function getListTicketSelected($ticketFolderId){
        $tickets = ContextRepository::TicketFolderRepository()->GetSelectedTicketFolderAuthUser($ticketFolderId);
        return view("customer-panels.panels.panel-tickets.info-ticket" , compact("tickets"))->render();
    }

    public function submitNewTicketClient($ticketCategoryId , $ticketFolderId , $title , $text){
        return ContextRepository::TicketFolderRepository()->SubmitTicketAuthUser($ticketCategoryId , $ticketFolderId , $title , $text);
    }



}