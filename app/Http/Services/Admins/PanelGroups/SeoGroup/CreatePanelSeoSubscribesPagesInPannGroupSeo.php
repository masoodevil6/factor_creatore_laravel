<?php
namespace App\Http\Services\Admins\PanelGroups\SeoGroup;

use App\Http\Services\Admins\CreatePanelAdminService;
use Illuminate\Support\Facades\Artisan;

class CreatePanelSeoSubscribesPagesInPannGroupSeo extends CreatePanelAdminService
{

    public function __construct()
    {
        $this->setPanelGroupName();
        $this->setPanelIcon("fa fa-files-o");
        $this->setPanelName("صفحات اشتراک ها");
        $this->setPanelLink("admin.seo.pages.subscribes.index");
        $this->insertInTablePanel();
    }

}