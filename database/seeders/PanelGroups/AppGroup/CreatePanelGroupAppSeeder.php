<?php
namespace Database\Seeders\PanelGroups\AppGroup;

use Database\Seeders\PanelTools\CreatePanelGroupAdmin;
use Illuminate\Database\Seeder;

class CreatePanelGroupAppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $panelGroupTitle = "مدیریت برنامه ها";
        $panelGroupTitleEn = "app";
        new CreatePanelGroupAdmin($panelGroupTitle , $panelGroupTitleEn);
    }
}