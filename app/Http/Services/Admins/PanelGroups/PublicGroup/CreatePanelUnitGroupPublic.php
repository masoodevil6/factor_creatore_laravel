<?php

namespace App\Http\Services\Admins\PanelGroups\PublicGroup;

use App\Http\Services\Admins\CreatePanelAdminService;

class CreatePanelUnitGroupPublic extends CreatePanelAdminService
{
    public function __construct()
    {
        $this->setPanelGroupName($this::class);
        $this->setPanelIcon("fas fa-calculator");
        $this->setPanelName("واحدها");
        $this->setPanelLink("admin.public.unit.index");
        $this->insertInTablePanel();
    }
}
