<?php
namespace Database\Seeders\PanelGroups\AppGroup;

use Database\Seeders\PanelTools\CreatePanelAdmin;
use Illuminate\Database\Seeder;

class CreatePanelAppFileLinkInPanelGroupAppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $panelGroupTitleEn = "app";
        $panelIcon = "fas fa-link";
        $panelName = "لینک برنامه ها";
        $panelLink = "admin.apps.link.index";

        new CreatePanelAdmin($panelGroupTitleEn , $panelIcon , $panelName , $panelLink);
    }
}