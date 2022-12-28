<?php

namespace App\View\Components\RowTables\Admin;

use Illuminate\View\Component;

class ComponentItemUser extends Component
{
    public $userKey;
    public $userId;
    public $userFullName;
    public $userStatus;

    public function __construct($userKey , $userId , $userFullName, $userStatus)
    {
        $this -> userKey = $userKey;
        $this -> userId = $userId;
        $this -> userFullName = $userFullName;
        $this -> userStatus = $userStatus;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.row-tables.admin.component-item-user');
    }
}
