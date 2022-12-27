<?php

namespace Database\Seeders\PanelGroups\TicketGroup;

use Database\Seeders\PanelTools\CreatePanelAdmin;
use Illuminate\Database\Seeder;

class CreatePanelTicketInPanelGroupUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $panelGroupTitleEn = "Ticket";
        $panelIcon = "fa fa-envelope-o";
        $panelName = "تیکت ها";
        $panelLink = "admin.tickets.ticket.index";

        new CreatePanelAdmin($panelGroupTitleEn , $panelIcon , $panelName , $panelLink);
    }
}
