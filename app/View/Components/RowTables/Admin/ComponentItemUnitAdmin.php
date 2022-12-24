<?php

namespace App\View\Components\RowTables\Admin;

use Illuminate\View\Component;

class ComponentItemUnitAdmin extends Component
{
    public $unitKey;
    public $unitId;
    public $unitName;

    public function __construct($unitKey , $unitId , $unitName)
    {
        $this -> unitKey = $unitKey;
        $this -> unitId = $unitId;
        $this -> unitName = $unitName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.row-tables.admin.component-item-unit-admin');
    }
}
