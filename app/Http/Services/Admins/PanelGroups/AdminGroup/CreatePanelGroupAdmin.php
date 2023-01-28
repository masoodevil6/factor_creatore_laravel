<?php

namespace App\Http\Services\Admins\PanelGroups\AdminGroup;

use App\Http\Services\Admins\CreatePanelGroupAdminService;

class CreatePanelGroupAdmin extends CreatePanelGroupAdminService
{
    public function __construct()
    {
        $this->setPanelGroupTitleEn($this::class);
        $this->setPanelGroupTitle("مدیریت ادمین ها");
        $this->insertInTablePanelGroup();
    }
}
