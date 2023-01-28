<?php

namespace App\Http\Services\Admins\PanelGroups\FactorGroup;

use App\Http\Services\Admins\CreatePanelGroupAdminService;

class CreatePanelGroupFactor extends CreatePanelGroupAdminService
{
    public function __construct()
    {
        $this->setPanelGroupTitleEn($this::class);
        $this->setPanelGroupTitle("مدیریت فاکتور ها");
        $this->insertInTablePanelGroup();
    }
}
