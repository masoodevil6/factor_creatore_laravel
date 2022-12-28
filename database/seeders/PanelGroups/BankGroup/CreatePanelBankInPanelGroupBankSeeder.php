<?php

namespace Database\Seeders\PanelGroups\BankGroup;

use Database\Seeders\PanelTools\CreatePanelAdmin;
use Illuminate\Database\Seeder;

class CreatePanelBankInPanelGroupBankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $panelGroupTitleEn = "bank";
        $panelIcon = "fas fa-bank";
        $panelName = "بانک ها";
        $panelLink = "admin.banks.bank.index";

        new CreatePanelAdmin($panelGroupTitleEn , $panelIcon , $panelName , $panelLink);
    }
}
