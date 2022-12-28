<?php

namespace Database\Seeders\PanelGroups\BankGroup;

use Database\Seeders\PanelTools\CreatePanelGroupAdmin;
use Illuminate\Database\Seeder;

class CreatePanelGroupBankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $panelGroupTitle = "مدیریت بانک ها";
        $panelGroupTitleEn = "bank";
        new CreatePanelGroupAdmin($panelGroupTitle , $panelGroupTitleEn);
    }
}
