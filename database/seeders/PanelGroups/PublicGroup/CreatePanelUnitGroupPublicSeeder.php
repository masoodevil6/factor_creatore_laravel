<?php

namespace Database\Seeders\PanelGroups\PublicGroup;

use Database\Seeders\PanelTools\CreatePanelAdmin;
use Illuminate\Database\Seeder;

class CreatePanelUnitGroupPublicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $panelGroupTitleEn = "public";
        $panelIcon = "fas fa-calculator";
        $panelName = "واحدها";
        $panelLink = "admin.public.unit.index";

        new CreatePanelAdmin($panelGroupTitleEn , $panelIcon , $panelName , $panelLink);
    }
}
