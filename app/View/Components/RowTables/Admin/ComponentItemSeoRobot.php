<?php

namespace App\View\Components\RowTables\Admin;

use Illuminate\View\Component;

class ComponentItemSeoRobot extends Component
{

    public $robotKey;
    public $robotId;
    public $robotTitle;
    public $robotDescription;
    public function __construct($robotKey , $robotId , $robotTitle , $robotDescription)
    {
        $this -> robotKey = $robotKey;
        $this -> robotId = $robotId;
        $this -> robotTitle = $robotTitle;
        $this -> robotDescription = $robotDescription;
    }


    public function render()
    {
        return view('components.row-tables.admin.component-item-seo-robot');
    }
}
