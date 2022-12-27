<?php

namespace Database\Seeders\PanelGroups\TicketGroup;

use Database\Seeders\PanelTools\CreatePanelAdmin;
use Illuminate\Database\Seeder;

class CreatePanelTicketCategoryInPanelGroupUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $panelGroupTitleEn = "Ticket";
        $panelIcon = "fas fa-archive";
        $panelName = "دسته بندی تیکت ها";
        $panelLink = "admin.tickets.ticket-category.index";

        new CreatePanelAdmin($panelGroupTitleEn , $panelIcon , $panelName , $panelLink);
    }
}
