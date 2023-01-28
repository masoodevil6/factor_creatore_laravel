<?php
namespace App\Http\Services\Admins;

use App\Http\Services\Admins\CreatePanelAdminService;
use Illuminate\Support\Facades\Config;
use function Symfony\Component\Uid\Factory\getNamespace;

class BaseAdminPanelService
{

    private $panelGroupName = "";
    private $panelIcon = "";
    private $panelName = "";
    private $panelLink = "";



    protected function getPanelGroupName(): string
    {
        return $this->panelGroupName;
    }

    protected function setPanelGroupName($panelGroupNamespace): void
    {
        foreach (Config::get("adminPanel.panels") as $panel){
            if ($panel["panel_class"] == $panelGroupNamespace){
                $this->panelGroupName = $panel["group_name"];
                break;
            }
        }
    }



    protected function getPanelIcon(): string
    {
        return $this->panelIcon;
    }

    protected function setPanelIcon(string $panelIcon): void
    {
        $this->panelIcon = $panelIcon;
    }




    protected function getPanelName(): string
    {
        return $this->panelName;
    }

    protected function setPanelName(string $panelName): void
    {
        $this->panelName = $panelName;
    }



    protected function getPanelLink(): string
    {
        return $this->panelLink;
    }

    protected function setPanelLink(string $panelLink): void
    {
        $this->panelLink = $panelLink;
    }




}