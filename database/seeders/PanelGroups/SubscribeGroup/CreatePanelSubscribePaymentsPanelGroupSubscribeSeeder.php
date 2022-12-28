<?php

namespace Database\Seeders\PanelGroups\SubscribeGroup;

use Database\Seeders\PanelTools\CreatePanelAdmin;
use Illuminate\Database\Seeder;

class CreatePanelSubscribePaymentsPanelGroupSubscribeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $panelGroupTitleEn = "subscribes";
        $panelIcon = "fa fa-usd";
        $panelName = "تراکنش های اشتراک";
        $panelLink = "admin.subscribes.subscribe-payment.index";

        new CreatePanelAdmin($panelGroupTitleEn , $panelIcon , $panelName , $panelLink);
    }
}
