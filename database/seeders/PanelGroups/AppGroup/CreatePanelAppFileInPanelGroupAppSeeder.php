<?php
namespace Database\Seeders\PanelGroups\AppGroup;

use Database\Seeders\PanelTools\CreatePanelAdmin;
use Illuminate\Database\Seeder;

class CreatePanelAppFileInPanelGroupAppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $panelGroupTitleEn = "app";
        $panelIcon = "fas fa-file";
        $panelName = "برنامه ها";
        $panelLink = "admin.apps.file.index";

        new CreatePanelAdmin($panelGroupTitleEn , $panelIcon , $panelName , $panelLink);
    }
}