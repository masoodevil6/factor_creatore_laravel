<?php

namespace Database\Seeders\PanelGroups\FormGroup;

use Database\Seeders\PanelTools\CreatePanelGroupAdmin;
use Illuminate\Database\Seeder;

class CreatePanelGroupFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $panelGroupTitle = "فرم های فاکتور";
        $panelGroupTitleEn = "Form";
        new CreatePanelGroupAdmin($panelGroupTitle , $panelGroupTitleEn);
    }
}
