<?php

namespace App\View\Components\RowTables\Admin;

use Illuminate\View\Component;

class ComponentItemBankAdmin extends Component
{
    public $bankKey;
    public $bankId;
    public $bankTitle;
    public $bankStatus;
    public function __construct($bankKey , $bankId , $bankTitle , $bankStatus)
    {
        $this -> bankKey = $bankKey;
        $this -> bankId = $bankId;
        $this -> bankTitle = $bankTitle;
        $this -> bankStatus = $bankStatus;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.row-tables.admin.component-item-bank-admin');
    }
}
