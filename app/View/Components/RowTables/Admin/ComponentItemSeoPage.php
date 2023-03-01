<?php

namespace App\View\Components\RowTables\Admin;

use Illuminate\View\Component;

class ComponentItemSeoPage extends Component
{
    public $pageKey;
    public $pageId;
    public $pageTitle;
    public $pageSeoTitle;
    public $pageSeoDescription;
    public function __construct($pageKey , $pageId , $pageTitle , $pageSeoTitle , $pageSeoDescription)
    {
        $this -> pageKey = $pageKey;
        $this -> pageId = $pageId;
        $this -> pageTitle = $pageTitle;
        $this -> pageSeoTitle = $pageSeoTitle;
        $this -> pageSeoDescription = $pageSeoDescription;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.row-tables.admin.component-item-seo-page');
    }
}
