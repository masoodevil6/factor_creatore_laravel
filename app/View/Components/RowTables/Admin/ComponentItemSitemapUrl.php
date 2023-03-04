<?php

namespace App\View\Components\RowTables\Admin;

use Illuminate\View\Component;

class ComponentItemSitemapUrl extends Component
{
    public $sitemapKey;
    public $sitemapId;
    public $sitemapTitle;
    public $sitemapUrl;
    public $sitemapFile;
    public function __construct($sitemapKey , $sitemapId, $sitemapTitle , $sitemapUrl , $sitemapFile)
    {
        $this -> sitemapKey = $sitemapKey;
        $this -> sitemapId = $sitemapId;
        $this -> sitemapTitle = $sitemapTitle;
        $this -> sitemapUrl = $sitemapUrl;
        $this -> sitemapFile = $sitemapFile;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.row-tables.admin.component-item-sitemap-url');
    }
}
