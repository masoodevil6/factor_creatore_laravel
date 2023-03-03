<?php

namespace App\View\Components\RowTables\Admin;

use Illuminate\View\Component;

class ComponentItemSeoSubscribesPage extends Component
{

    public $pageKey;
    public $pageSlug;
    public $pageTitle;
    public $pageSeoTitle;
    public $pageSeoDescription;
    public function __construct($pageKey , $pageSlug, $pageTitle , $pageSeoTitle , $pageSeoDescription)
    {
        $this -> pageKey = $pageKey;
        $this -> pageSlug = $pageSlug;
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
        return view('components.row-tables.admin.component-item-seo-subscribes-page');
    }
}
