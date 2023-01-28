<?php

namespace App\Http\Services\Admins\PanelGroups\SubscribeGroup;


use App\Http\Services\Admins\CreatePanelGroupAdminService;

class CreatePanelGroupSubscribe extends CreatePanelGroupAdminService
{
    public function __construct()
    {
        $this->setPanelGroupTitleEn($this::class);
        $this->setPanelGroupTitle("مدیریت اشتراک");
        $this->insertInTablePanelGroup();
    }
}
