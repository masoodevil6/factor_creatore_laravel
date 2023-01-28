<?php

namespace App\Http\Services\Admins\PanelGroups\FormGroup;

use App\Http\Services\Admins\CreatePanelAdminService;

class CreatePanelFormPanelGroupForm extends CreatePanelAdminService
{
    public function __construct()
    {
        $this->setPanelGroupName($this::class);
        $this->setPanelIcon("fa fa-archive");
        $this->setPanelName("فرم ها");
        $this->setPanelLink("admin.forms.form.index");
        $this->insertInTablePanel();
    }
}
