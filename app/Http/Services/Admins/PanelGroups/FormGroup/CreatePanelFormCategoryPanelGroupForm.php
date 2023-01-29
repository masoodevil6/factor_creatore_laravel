<?php

namespace App\Http\Services\Admins\PanelGroups\FormGroup;

use App\Http\Services\Admins\CreatePanelAdminService;

class CreatePanelFormCategoryPanelGroupForm extends CreatePanelAdminService
{

    public function __construct()
    {
        $this->setPanelGroupName();
        $this->setPanelIcon("fa fa-th-list");
        $this->setPanelName("دسته بندی فرم ها");
        $this->setPanelLink("admin.forms.form-category.index");
        $this->insertInTablePanel();
    }
    
}
