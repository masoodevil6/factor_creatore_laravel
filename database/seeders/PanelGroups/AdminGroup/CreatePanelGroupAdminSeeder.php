<?php

namespace Database\Seeders\PanelGroups\AdminGroup;

use Database\Seeders\PanelTools\CreatePanelGroupAdmin;
use Illuminate\Database\Seeder;

class CreatePanelGroupAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $panelGroupTitle = "مدیریت ادمین ها";
        $panelGroupTitleEn = "admin";
        new CreatePanelGroupAdmin($panelGroupTitle , $panelGroupTitleEn);
    }
}
