<?php

namespace Database\Seeders\PanelGroups\PublicGroup;

use Database\Seeders\PanelTools\CreatePanelGroupAdmin;
use Illuminate\Database\Seeder;

class CreatePanelGroupPublicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $panelGroupTitle = "مدیریت عمومی";
        $panelGroupTitleEn = "public";
        new CreatePanelGroupAdmin($panelGroupTitle , $panelGroupTitleEn);
    }
}
