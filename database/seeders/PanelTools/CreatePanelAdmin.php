<?php

namespace Database\Seeders\PanelTools;

use App\Repositories\ContextRepository;

class CreatePanelAdmin{

    protected $panelGroupTitleEn;
    protected $panelIcon;
    protected $panelName;
    protected $panelLink;


    public function __construct($panelGroupTitleEn , $panelIcon , $panelName , $panelLink)
    {
        $this->panelGroupTitleEn = $panelGroupTitleEn;
        $this->panelIcon = $panelIcon;
        $this->panelName = $panelName;
        $this->panelLink = $panelLink;
        $this -> insertInTablePanel();
    }

    public function insertInTablePanel(){

        $panelGroup = ContextRepository::PanelGroupRepository()->getPanelGroupWithTitle($this->panelGroupTitleEn);
        $panel = ContextRepository::PanelRepository()->getPanelGroupAndLink($panelGroup->id , $this->panelLink);

        if (empty($panel)){

            $data = [
                "icon" => $this->panelIcon ,
                "name" => $this->panelName ,
                "link" => $this->panelLink ,
                "panel_group_id" => $panelGroup->id ,
            ];

            $result = ContextRepository::PanelRepository()->addResult($data);

            if ($result != null){
                $panelAdmin = new PanelAdmin();
                $panelAdmin->addItemToMainPanel($result->id);
            }

        }
    }

}