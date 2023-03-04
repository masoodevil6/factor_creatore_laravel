<?php
namespace App\Http\Services\Admins\PanelGroups\SitemapGroup;

use App\Http\Services\Admins\CreatePanelAdminService;
use Illuminate\Support\Facades\Artisan;

class CreatePanelSitemapFilesInPannGroupSitemap extends CreatePanelAdminService
{

    public function __construct()
    {
        $this->setPanelGroupName();
        $this->setPanelIcon("fa fa-sitemap");
        $this->setPanelName("صفحات نقشه سایت");
        $this->setPanelLink("admin.sitemap.file.index");
        $this->insertInTablePanel();
    }

}