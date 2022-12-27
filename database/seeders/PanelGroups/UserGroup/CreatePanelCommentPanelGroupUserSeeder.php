<?php

namespace Database\Seeders\PanelGroups\UserGroup;

use Database\Seeders\PanelTools\CreatePanelAdmin;
use Illuminate\Database\Seeder;

class CreatePanelCommentPanelGroupUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $panelGroupTitleEn = "User";
        $panelIcon = "fas fa-comments";
        $panelName = "نظرات";
        $panelLink = "admin.users.comment.index";;

        new CreatePanelAdmin($panelGroupTitleEn , $panelIcon , $panelName , $panelLink);
    }
}
