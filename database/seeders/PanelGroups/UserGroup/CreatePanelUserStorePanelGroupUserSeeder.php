<?php

namespace Database\Seeders\PanelGroups\UserGroup;

use Database\Seeders\PanelTools\CreatePanelAdmin;
use Illuminate\Database\Seeder;

class CreatePanelUserStorePanelGroupUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $panelGroupTitleEn = "User";
        $panelIcon = "fa fa-address-card";
        $panelName = "فروشگاه کاربران";
        $panelLink = "admin.users.user-store.index";

        new CreatePanelAdmin($panelGroupTitleEn , $panelIcon , $panelName , $panelLink);
    }
}
