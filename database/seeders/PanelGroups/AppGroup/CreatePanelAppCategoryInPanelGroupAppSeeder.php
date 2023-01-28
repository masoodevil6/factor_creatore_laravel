<?php
namespace Database\Seeders\PanelGroups\AppGroup;

use Database\Seeders\PanelTools\CreatePanelAdmin;
use Illuminate\Database\Seeder;

class CreatePanelAppCategoryInPanelGroupAppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $panelGroupTitleEn = "app";
        $panelIcon = "fas fa-th-list";
        $panelName = "دسته بندی برنامه ها";
        $panelLink = "admin.apps.category.index";

        new CreatePanelAdmin($panelGroupTitleEn , $panelIcon , $panelName , $panelLink);
    }
}