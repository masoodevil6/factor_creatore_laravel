<?php

namespace Database\Seeders\PanelGroups\FormGroup;

use Database\Seeders\PanelTools\CreatePanelAdmin;
use Illuminate\Database\Seeder;

class CreatePanelFormPanelGroupFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $panelGroupTitleEn = "Form";
        $panelIcon = "fa fa-archive";
        $panelName = "فرم ها";
        $panelLink = "admin.forms.form.index";

        new CreatePanelAdmin($panelGroupTitleEn , $panelIcon , $panelName , $panelLink);
    }
}
