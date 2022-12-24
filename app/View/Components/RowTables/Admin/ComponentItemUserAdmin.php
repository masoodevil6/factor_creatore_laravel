<?php

namespace App\View\Components\RowTables\Admin;

use Illuminate\View\Component;

class ComponentItemUserAdmin extends Component
{
    public $userAdminKey;
    public $userAdminStatus;
    public $adminTitle;
    public $userId;
    public $userEmail;
    public $userName;
    public function __construct($userAdminKey , $userAdminStatus , $adminTitle , $userId , $userEmail , $userName)
    {
        $this ->userAdminKey =$userAdminKey;
        $this ->userAdminStatus =$userAdminStatus;
        $this ->adminTitle =$adminTitle;
        $this ->userId =$userId;
        $this ->userEmail =$userEmail;
        $this ->userName =$userName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.row-tables.admin.component-item-user-admin');
    }
}
