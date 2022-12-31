<?php
namespace App\Http\Controllers\PanelCustomer\Panels\PanelCustomer;


class BasePanelCustomer{

    private $titleFa;
    private $titleEn;
    private $icon;

    public function getTitleFa()
    {
        return $this->titleFa;
    }
    protected function setTitleFa($titleFa)
    {
        $this->titleFa = $titleFa;
    }


    public function getTitleEn()
    {
        return $this->titleEn;
    }
    protected function setTitleEn($titleEn)
    {
        $this->titleEn = $titleEn;
    }


    public function getIcon()
    {
        return $this->icon;
    }
    protected function setIcon($icon)
    {
        $this->icon = $icon;
    }


}