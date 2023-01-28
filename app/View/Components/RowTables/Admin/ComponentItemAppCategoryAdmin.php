<?php

namespace App\View\Components\RowTables\Admin;

use Illuminate\View\Component;

class ComponentItemAppCategoryAdmin extends Component
{

    public $appCategoryKey;
    public $appCategoryId;
    public $appCategoryName;
    public function __construct($appCategoryKey , $appCategoryId , $appCategoryName)
    {
        $this -> appCategoryKey = $appCategoryKey;
        $this -> appCategoryId = $appCategoryId;
        $this -> appCategoryName = $appCategoryName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.row-tables.admin.component-item-app-category-admin');
    }
}
