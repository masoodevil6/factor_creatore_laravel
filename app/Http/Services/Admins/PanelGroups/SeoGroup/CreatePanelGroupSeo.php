<?php
namespace App\Http\Services\Admins\PanelGroups\SeoGroup;

use App\Http\Services\Admins\CreatePanelGroupAdminService;

class CreatePanelGroupSeo extends CreatePanelGroupAdminService
{
    public function __construct()
    {
        $this->setPanelGroupTitleEn();
        $this->setPanelGroupTitle("مدیریت سئو سایت");
        $this->insertInTablePanelGroup();
    }
}
