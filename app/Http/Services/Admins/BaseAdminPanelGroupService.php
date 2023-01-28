<?php
namespace App\Http\Services\Admins;


use Illuminate\Support\Facades\Config;

class BaseAdminPanelGroupService
{

    private $panelGroupTitle;
    private $panelGroupTitleEn;


    protected function getPanelGroupTitle()
    {
        return $this->panelGroupTitle;
    }

    protected function setPanelGroupTitle($panelGroupTitle): void
    {
        $this->panelGroupTitle = $panelGroupTitle;
    }



    protected function getPanelGroupTitleEn()
    {
        return $this->panelGroupTitleEn;
    }

    protected function setPanelGroupTitleEn($panelGroupNamespace): void
    {
        foreach (Config::get("adminPanel.panels") as $panel){
            if ($panel["panel_class"] == $panelGroupNamespace){
                $this->panelGroupName = $panel["group_name"];
                break;
            }
        }
    }


}