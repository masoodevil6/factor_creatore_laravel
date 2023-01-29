<?php

namespace App\Http\Services\Admins\PanelGroups\FactorGroup;

use App\Http\Services\Admins\CreatePanelAdminService;

class CreatePanelFactorsInPanelGroupFactor extends CreatePanelAdminService
{

    public function __construct()
    {
        $this->setPanelGroupName();
        $this->setPanelIcon("fa fa-book");
        $this->setPanelName("فاکتور ها");
        $this->setPanelLink("admin.factors.factor.index");
        $this->insertInTablePanel();
    }

}
