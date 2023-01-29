<?php

namespace App\Http\Services\Admins\PanelGroups\UserGroup;

use App\Http\Services\Admins\CreatePanelAdminService;

class CreatePanelUserPanelGroupUser extends CreatePanelAdminService
{
    public function __construct()
    {
        $this->setPanelGroupName();
        $this->setPanelIcon("fa fa-user");
        $this->setPanelName("کاربران");
        $this->setPanelLink("admin.users.user.index");
        $this->insertInTablePanel();
    }
}
