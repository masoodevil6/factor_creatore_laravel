<?php

namespace App\View\Components\RowTables\Admin;

use Illuminate\View\Component;

class ComponentItemSitemapFile extends Component
{
    public $sitemapKey;
    public $sitemapId;
    public $sitemapTitleFa;
    public $sitemapTitleEn;
    public function __construct($sitemapKey , $sitemapId, $sitemapTitleFa , $sitemapTitleEn)
    {
        $this -> sitemapKey = $sitemapKey;
        $this -> sitemapId = $sitemapId;
        $this -> sitemapTitleFa = $sitemapTitleFa;
        $this -> sitemapTitleEn = $sitemapTitleEn;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.row-tables.admin.component-item-sitemap-file');
    }
}
