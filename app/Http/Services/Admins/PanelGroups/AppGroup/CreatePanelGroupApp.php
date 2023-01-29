<?php
namespace App\Http\Services\Admins\PanelGroups\AppGroup;

use App\Http\Services\Admins\CreatePanelGroupAdminService;

class CreatePanelGroupApp extends CreatePanelGroupAdminService
{
    public function __construct()
    {
        $this->setPanelGroupTitleEn();
        $this->setPanelGroupTitle("مدیریت برنامه ها");
        $this->insertInTablePanelGroup();
    }
}