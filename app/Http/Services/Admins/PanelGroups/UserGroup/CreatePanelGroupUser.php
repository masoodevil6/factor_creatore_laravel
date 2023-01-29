<?php

namespace App\Http\Services\Admins\PanelGroups\UserGroup;

use App\Http\Services\Admins\CreatePanelGroupAdminService;

class CreatePanelGroupUser extends CreatePanelGroupAdminService
{
    public function __construct()
    {
        $this->setPanelGroupTitleEn();
        $this->setPanelGroupTitle("مدیریت کاربران");
        $this->insertInTablePanelGroup();
    }
}
