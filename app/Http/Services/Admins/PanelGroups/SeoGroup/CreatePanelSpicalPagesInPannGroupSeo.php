<?php
namespace App\Http\Services\Admins\PanelGroups\SeoGroup;

use App\Http\Services\Admins\CreatePanelAdminService;
use Illuminate\Support\Facades\Artisan;

class CreatePanelSpicalPagesInPannGroupSeo extends CreatePanelAdminService
{

    public function __construct()
    {
        $this->setPanelGroupName();
        $this->setPanelIcon("fa fa-bookmark");
        $this->setPanelName("صفحات ثابت");
        $this->setPanelLink("admin.seo.pages.spical.index");
        $this->insertInTablePanel();
    }

}