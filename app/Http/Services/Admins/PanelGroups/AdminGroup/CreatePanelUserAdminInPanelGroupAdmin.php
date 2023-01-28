<?php

namespace App\Http\Services\Admins\AdminsPanelGroups\AdminGroup;

use App\Http\Services\Admins\CreatePanelAdminService;

class CreatePanelUserAdminInPanelGroupAdmin extends CreatePanelAdminService
{

    public function __construct()
    {
        $this->setPanelGroupName($this::class);
        $this->setPanelIcon("fa fa-users");
        $this->setPanelName("ادمین ها");
        $this->setPanelLink("admin.panel.user-admin.index");
        $this->insertInTablePanel();
    }

}
