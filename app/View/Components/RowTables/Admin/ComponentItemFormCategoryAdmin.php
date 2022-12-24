<?php

namespace App\View\Components\RowTables\Admin;

use Illuminate\View\Component;

class ComponentItemFormCategoryAdmin extends Component
{

    public $formCategoryKey;
    public $formCategoryId;
    public $formCategoryTitle;
    public $formCategoryStatus;

    public function __construct($formCategoryKey , $formCategoryId , $formCategoryTitle , $formCategoryStatus)
    {
        $this -> formCategoryKey = $formCategoryKey;
        $this -> formCategoryId = $formCategoryId;
        $this -> formCategoryTitle = $formCategoryTitle;
        $this -> formCategoryStatus = $formCategoryStatus;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.row-tables.admin.component-item-form-category-admin');
    }
}
