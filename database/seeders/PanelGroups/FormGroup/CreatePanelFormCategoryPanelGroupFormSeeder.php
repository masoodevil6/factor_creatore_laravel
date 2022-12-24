<?php

namespace Database\Seeders\PanelGroups\FormGroup;

use Database\Seeders\PanelTools\CreatePanelAdmin;
use Illuminate\Database\Seeder;

class CreatePanelFormCategoryPanelGroupFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $panelGroupTitleEn = "Form";
        $panelIcon = "fa fa-th-list";
        $panelName = "دسته بندی فرم ها";
        $panelLink = "admin.forms.form-category.index";

        new CreatePanelAdmin($panelGroupTitleEn , $panelIcon , $panelName , $panelLink);
    }
}
