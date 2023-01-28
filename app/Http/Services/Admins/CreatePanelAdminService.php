<?php

namespace App\Http\Services\Admins;

use App\Repositories\ContextRepository;

class CreatePanelAdminService extends BaseAdminPanelService {

    protected function insertInTablePanel(){

        $panelGroup = ContextRepository::PanelGroupRepository()->getPanelGroupWithTitle($this->getPanelGroupName());
        $panel = ContextRepository::PanelRepository()->getPanelGroupAndLink($panelGroup->id , $this->getPanelLink());

        if (empty($panel)){

            $data = [
                "icon" => $this->getPanelIcon() ,
                "name" => $this->getPanelName() ,
                "link" => $this->getPanelLink() ,
                "panel_group_id" => $panelGroup->id ,
            ];

            $result = ContextRepository::PanelRepository()->addResult($data);

            if ($result != null){
                $panelAdmin = new PanelAdminService();
                $panelAdmin->addItemToMainPanel($result->id);
            }

        }
    }

}