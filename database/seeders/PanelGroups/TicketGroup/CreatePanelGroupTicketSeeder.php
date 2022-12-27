<?php

namespace Database\Seeders\PanelGroups\TicketGroup;

use Database\Seeders\PanelTools\CreatePanelGroupAdmin;
use Illuminate\Database\Seeder;

class CreatePanelGroupTicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $panelGroupTitle = "مدیریت تیکت ها";
        $panelGroupTitleEn = "Ticket";
        new CreatePanelGroupAdmin($panelGroupTitle , $panelGroupTitleEn);
    }
}
