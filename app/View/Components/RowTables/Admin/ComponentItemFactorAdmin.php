<?php

namespace App\View\Components\RowTables\Admin;

use Illuminate\View\Component;

class ComponentItemFactorAdmin extends Component
{

    public $factorKey;
    public $factorId;
    public $factorResNum;
    public $factorUserName = "";
    public $factorFormName = "";
    public $factorDate;
    public $factorStatus;

    public function __construct($factorKey , $factorId ,$factorResNum,$factorUser,$factorForm,$factorDate,$factorStatus)
    {
        $this -> factorKey = $factorKey;
        $this -> factorId = $factorId;
        $this -> factorResNum = $factorResNum;
        if (!empty($factorUser)){
            $this -> factorUserName = $factorUser -> fullName;
        }
        if (!empty($factorForm)){
            $this -> factorFormName = $factorForm -> name;
        }
        $this -> factorDate = jalaliDate($factorDate , " %d %B %y");
        $this -> factorStatus = $factorStatus;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.row-tables.admin.component-item-factor-admin');
    }
}
