<?php

namespace App\Http\Services\Admins\PanelGroups\SubscribeGroup;

use App\Http\Services\Admins\CreatePanelAdminService;

class CreatePanelSubscribePanelGroupSubscribe extends CreatePanelAdminService
{
    public function __construct()
    {
        $this->setPanelGroupName($this::class);
        $this->setPanelIcon("fa fa-credit-card");
        $this->setPanelName("اشتراک ها");
        $this->setPanelLink("admin.subscribes.subscribe.index");
        $this->insertInTablePanel();
    }
}
