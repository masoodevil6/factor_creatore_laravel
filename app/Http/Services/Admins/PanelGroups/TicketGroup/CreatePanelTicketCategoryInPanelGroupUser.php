<?php

namespace App\Http\Services\Admins\PanelGroups\TicketGroup;

use App\Http\Services\Admins\CreatePanelAdminService;

class CreatePanelTicketCategoryInPanelGroupUser extends CreatePanelAdminService
{
    public function __construct()
    {
        $this->setPanelGroupName($this::class);
        $this->setPanelIcon("fas fa-archive");
        $this->setPanelName("دسته بندی تیکت ها");
        $this->setPanelLink("admin.tickets.ticket-category.index");
        $this->insertInTablePanel();
    }
}
