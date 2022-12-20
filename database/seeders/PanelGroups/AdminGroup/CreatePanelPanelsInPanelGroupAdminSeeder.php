<?php

namespace Database\Seeders\PanelGroups\AdminGroup;

use Database\Seeders\PanelTools\CreatePanelAdmin;
use Illuminate\Database\Seeder;

class CreatePanelPanelsInPanelGroupAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $panelGroupTitleEn = "admin";
        $panelIcon = "fa fa-address-card";
        $panelName = "پنل ها";
        $panelLink = "admin.panel.admin.index";

        new CreatePanelAdmin($panelGroupTitleEn , $panelIcon , $panelName , $panelLink);
    }
}
