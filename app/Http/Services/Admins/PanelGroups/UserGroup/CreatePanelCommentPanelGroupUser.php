<?php

namespace App\Http\Services\Admins\PanelGroups\UserGroup;

use App\Http\Services\Admins\CreatePanelAdminService;

class CreatePanelCommentPanelGroupUser extends CreatePanelAdminService
{
    public function __construct()
    {
        $this->setPanelGroupName();
        $this->setPanelIcon("fas fa-comments");
        $this->setPanelName("نظرات");
        $this->setPanelLink("admin.users.comment.index");
        $this->insertInTablePanel();
    }
}
