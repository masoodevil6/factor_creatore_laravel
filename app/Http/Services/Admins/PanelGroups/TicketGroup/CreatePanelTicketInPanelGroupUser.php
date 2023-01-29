<?php

namespace App\Http\Services\Admins\PanelGroups\TicketGroup;


use App\Http\Services\Admins\CreatePanelAdminService;

class CreatePanelTicketInPanelGroupUser extends CreatePanelAdminService
{
    public function __construct()
    {
        $this->setPanelGroupName();
        $this->setPanelIcon("fa fa-envelope-o");
        $this->setPanelName("تیکت ها");
        $this->setPanelLink("admin.tickets.ticket.index");
        $this->insertInTablePanel();
    }
}
