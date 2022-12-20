<?php

namespace Database\Seeders\PanelGroups\PublicGroup;

use Database\Seeders\PanelTools\CreatePanelAdmin;
use Illuminate\Database\Seeder;

class CreatePanelSettingSitePanelGroupPublicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $panelGroupTitleEn = "public";
        $panelIcon = "fas fa-cog";
        $panelName = "تنظیمات عمومی";
        $panelLink = "admin.public.setting.index";

        new CreatePanelAdmin($panelGroupTitleEn , $panelIcon , $panelName , $panelLink);
    }
}
