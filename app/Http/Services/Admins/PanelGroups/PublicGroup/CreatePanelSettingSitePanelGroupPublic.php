<?php

namespace App\Http\Services\Admins\PanelGroups\PublicGroup;

use App\Http\Services\Admins\CreatePanelAdminService;

class CreatePanelSettingSitePanelGroupPublic extends CreatePanelAdminService
{

    public function __construct()
    {
        $this->setPanelGroupName($this::class);
        $this->setPanelIcon("fas fa-cog");
        $this->setPanelName("تنظیمات عمومی");
        $this->setPanelLink("admin.public.setting.index");
        $this->insertInTablePanel();
    }

}
