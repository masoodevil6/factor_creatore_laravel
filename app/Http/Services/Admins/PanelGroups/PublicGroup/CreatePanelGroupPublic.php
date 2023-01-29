<?php

namespace App\Http\Services\Admins\PanelGroups\PublicGroup;

use App\Http\Services\Admins\CreatePanelGroupAdminService;

class CreatePanelGroupPublic extends CreatePanelGroupAdminService
{
    public function __construct()
    {
        $this->setPanelGroupTitleEn();
        $this->setPanelGroupTitle("مدیریت عمومی");
        $this->insertInTablePanelGroup();
    }
}
