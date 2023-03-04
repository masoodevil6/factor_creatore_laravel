<?php
namespace App\Http\Services\Admins\PanelGroups\SitemapGroup;

use App\Http\Services\Admins\CreatePanelAdminService;
use Illuminate\Support\Facades\Artisan;

class CreatePanelSitemapUrlsInPannGroupSitemap extends CreatePanelAdminService
{

    public function __construct()
    {
        $this->setPanelGroupName();
        $this->setPanelIcon("fa fa-code");
        $this->setPanelName("ادرس های نقشه سایت");
        $this->setPanelLink("admin.sitemap.url.index");
        $this->insertInTablePanel();
    }

}