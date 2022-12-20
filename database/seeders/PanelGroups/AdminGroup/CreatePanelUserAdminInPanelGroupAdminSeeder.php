<?php

namespace Database\Seeders\PanelGroups\AdminGroup;

use Database\Seeders\PanelTools\CreatePanelAdmin;
use Illuminate\Database\Seeder;

class CreatePanelUserAdminInPanelGroupAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $panelGroupTitleEn = "admin";
        $panelIcon = "fas fa-users";
        $panelName = "ادمین ها";
        $panelLink = "admin.panel.user-admin.index";

        new CreatePanelAdmin($panelGroupTitleEn , $panelIcon , $panelName , $panelLink);
    }
}
