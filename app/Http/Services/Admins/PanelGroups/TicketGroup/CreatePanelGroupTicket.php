<?php

namespace App\Http\Services\Admins\PanelGroups\TicketGroup;

use App\Http\Services\Admins\CreatePanelGroupAdminService;

class CreatePanelGroupTicket extends CreatePanelGroupAdminService
{
    public function __construct()
    {
        $this->setPanelGroupTitleEn($this::class);
        $this->setPanelGroupTitle("مدیریت تیکت ها");
        $this->insertInTablePanelGroup();
    }
}
