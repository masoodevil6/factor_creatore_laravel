<?php

namespace Database\Seeders\PanelGroups\FactorGroup;

use Database\Seeders\PanelTools\CreatePanelAdmin;
use Illuminate\Database\Seeder;

class CreatePanelFactorsInPanelGroupFactorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $panelGroupTitleEn = "Factor";
        $panelIcon = "fa fa-book";
        $panelName = "فاکتور ها";
        $panelLink = "admin.factors.factor.index";

        new CreatePanelAdmin($panelGroupTitleEn , $panelIcon , $panelName , $panelLink);
    }
}
