<?php
namespace App\Http\Services\Admins\PanelGroups\AppGroup;

use App\Http\Services\Admins\CreatePanelAdminService;

class CreatePanelAppCategoryInPanelGroupApp extends CreatePanelAdminService
{

    public function __construct()
    {
        $this->setPanelGroupName($this::class);
        $this->setPanelIcon("fa fa-th-list");
        $this->setPanelName("دسته بندی برنامه ها");
        $this->setPanelLink("admin.apps.category.index");
        $this->insertInTablePanel();
    }

}