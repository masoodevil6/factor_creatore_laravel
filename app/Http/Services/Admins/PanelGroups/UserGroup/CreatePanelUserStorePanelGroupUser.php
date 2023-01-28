<?php

namespace App\Http\Services\Admins\PanelGroups\UserGroup;

use App\Http\Services\Admins\CreatePanelAdminService;

class CreatePanelUserStorePanelGroupUser extends CreatePanelAdminService
{
    public function __construct()
    {
        $this->setPanelGroupName($this::class);
        $this->setPanelIcon("fa fa-address-card");
        $this->setPanelName("فروشگاه کاربران");
        $this->setPanelLink("admin.users.user-store.index");
        $this->insertInTablePanel();
    }
}
