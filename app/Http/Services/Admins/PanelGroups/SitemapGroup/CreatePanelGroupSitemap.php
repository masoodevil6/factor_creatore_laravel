<?php
namespace App\Http\Services\Admins\PanelGroups\SitemapGroup;

use App\Http\Services\Admins\CreatePanelGroupAdminService;

class CreatePanelGroupSitemap extends CreatePanelGroupAdminService
{
    public function __construct()
    {
        $this->setPanelGroupTitleEn();
        $this->setPanelGroupTitle("مدیریت نقشه سایت");
        $this->insertInTablePanelGroup();
    }
}
