<?php

namespace App\Http\Services\Admins\PanelGroups\AdminGroup;

use App\Http\Services\Admins\CreatePanelAdminService;

class CreatePanelPanelsInPanelGroupAdmin extends CreatePanelAdminService
{

    public function __construct()
    {
        $this->setPanelGroupName();
        $this->setPanelIcon("fa fa-address-card");
        $this->setPanelName("پنل ها");
        $this->setPanelLink("admin.panel.admin.index");
        $this->insertInTablePanel();
    }

}
