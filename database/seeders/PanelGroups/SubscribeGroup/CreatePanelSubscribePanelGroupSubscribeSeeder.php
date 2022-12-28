<?php

namespace Database\Seeders\PanelGroups\SubscribeGroup;

use Database\Seeders\PanelTools\CreatePanelAdmin;
use Illuminate\Database\Seeder;

class CreatePanelSubscribePanelGroupSubscribeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $panelGroupTitleEn = "subscribes";
        $panelIcon = "fa fa-credit-card";
        $panelName = "اشتراک ها";
        $panelLink = "admin.subscribes.subscribe.index";

        new CreatePanelAdmin($panelGroupTitleEn , $panelIcon , $panelName , $panelLink);
    }
}
