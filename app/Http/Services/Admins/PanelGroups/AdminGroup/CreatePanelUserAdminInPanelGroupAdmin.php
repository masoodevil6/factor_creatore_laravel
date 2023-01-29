<?php

namespace App\Http\Services\Admins\PanelGroups\AdminGroup;

use App\Http\Services\Admins\CreatePanelAdminService;

class CreatePanelUserAdminInPanelGroupAdmin extends CreatePanelAdminService
{

    public function __construct()
    {
        $this->setPanelGroupName();
        $this->setPanelIcon("fa fa-users");
        $this->setPanelName("ادمین ها");
        $this->setPanelLink("admin.panel.user-admin.index");
        $this->insertInTablePanel();
    }

}
