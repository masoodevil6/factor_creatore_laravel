<?php

namespace App\Http\Services\Admins\PanelGroups\FormGroup;

use App\Http\Services\Admins\CreatePanelGroupAdminService;

class CreatePanelGroupForm extends CreatePanelGroupAdminService
{
    public function __construct()
    {
        $this->setPanelGroupTitleEn();
        $this->setPanelGroupTitle("فرم های فاکتور");
        $this->insertInTablePanelGroup();
    }
}
