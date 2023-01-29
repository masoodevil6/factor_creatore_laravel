<?php

namespace App\Http\Services\Admins\PanelGroups\BankGroup;

use App\Http\Services\Admins\CreatePanelGroupAdminService;

class CreatePanelGroupBank extends CreatePanelGroupAdminService
{
    public function __construct()
    {
        $this->setPanelGroupTitleEn();
        $this->setPanelGroupTitle("مدیریت بانک ها");
        $this->insertInTablePanelGroup();
    }
}
