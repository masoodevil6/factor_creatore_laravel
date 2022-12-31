<?php

namespace App\View\Components\RowTables\Admin;

use Illuminate\View\Component;

class ComponentDropDownListUserPanels extends Component
{
    public $userId;
    public $userName;
    public function __construct($userId , $userName)
    {
        $this->userId = $userId;
        $this->userName = $userName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.row-tables.admin.component-drop-down-list-user-panels');
    }
}
