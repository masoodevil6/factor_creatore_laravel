<?php
namespace App\Http\Services\Admins\PanelGroups\AppGroup;

use App\Http\Services\Admins\CreatePanelAdminService;

class CreatePanelAppFileLinkInPanelGroupApp extends CreatePanelAdminService
{

    public function __construct()
    {
        $this->setPanelGroupName($this::class);
        $this->setPanelIcon("fa fa-link");
        $this->setPanelName("لینک برنامه ها");
        $this->setPanelLink("admin.apps.link.index");
        $this->insertInTablePanel();
    }

}