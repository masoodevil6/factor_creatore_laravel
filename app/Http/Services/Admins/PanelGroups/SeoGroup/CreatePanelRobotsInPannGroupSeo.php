<?php
namespace App\Http\Services\Admins\PanelGroups\SeoGroup;

use App\Http\Services\Admins\CreatePanelAdminService;
use Illuminate\Support\Facades\Artisan;

class CreatePanelRobotsInPannGroupSeo extends CreatePanelAdminService
{

    public function __construct()
    {
        $this->setPanelGroupName();
        $this->setPanelIcon("fa fa-github-alt");
        $this->setPanelName("ربات ها");
        $this->setPanelLink("admin.seo.robot.index");
        $this->insertInTablePanel();
    }

}