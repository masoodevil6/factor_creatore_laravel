<?php
namespace Database\Seeders\PanelTools;

use App\Repositories\ContextRepository;

class CreatePanelGroupAdmin{

    protected $panelGroupTitle;
    protected $panelGroupTitleEn;

    public function __construct($panelGroupTitle , $panelGroupTitleEn )
    {
        $this->panelGroupTitle = $panelGroupTitle;
        $this->panelGroupTitleEn = $panelGroupTitleEn;

        $this->insertInTablePanelGroup();
    }

    protected function insertInTablePanelGroup(){

        $panelGroup = ContextRepository::PanelGroupRepository()->getPanelGroupWithTitle($this->panelGroupTitleEn);

        if (empty($panelGroup)){

            $data = [
                "title" => $this->panelGroupTitle ,
                "title_en" => $this->panelGroupTitleEn ,
            ];

            ContextRepository::PanelGroupRepository()->addResult($data);
        }

    }

}