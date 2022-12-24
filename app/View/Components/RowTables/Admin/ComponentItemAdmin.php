<?php

namespace App\View\Components\RowTables\Admin;

use Illuminate\View\Component;

class ComponentItemAdmin extends Component
{
    
    public $adminKey;
    public $adminId;
    public $adminTitle;
    public $adminStatus;
    
    public function __construct($adminKey , $adminId , $adminTitle , $adminStatus)
    {
        $this -> adminKey = $adminKey;
        $this -> adminId = $adminId;
        $this -> adminTitle = $adminTitle;
        $this -> adminStatus = $adminStatus;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.row-tables.admin.component-item-admin');
    }
}
