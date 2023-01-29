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

    protected function setPanelGroupTitleEn(): void
    {
        foreach (Config::get("adminPanel.groups") as $group){
            if ($group["group_class"] == $this::class){
                $this->panelGroupTitleEn = $group["group_name"];
                break;
            }
        }

    }


}