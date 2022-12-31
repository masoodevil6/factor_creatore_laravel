<?php

namespace App\Http\Controllers\PanelCustomer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PanelCustomer\Panels\ListCustomerPanels;
use App\Http\Requests\CustomerPanel\PanelTicketSubmitRequest;
use Illuminate\Http\Request;

class TicketsPanelCustomerController extends BasePanelCustomerPanel
{
    public function __construct(ListCustomerPanels $listCustomerPanels)
    {
        $this->panelName = "tickets";
        parent::__construct($listCustomerPanels);
    }

    public function getListInfoTicket(Request $request){
        return $this->panel->getListTicketSelected($request->get("ticket_id"));
    }

    public function submitNewTicket(PanelTicketSubmitRequest $request){
        return $this->panel->submitNewTicketClient(
            $request->get("ticket_category_id") ,
            $request->get("ticket_id") ,
            $request->get("title") ,
            $request->get("text")
        );
    }
}
