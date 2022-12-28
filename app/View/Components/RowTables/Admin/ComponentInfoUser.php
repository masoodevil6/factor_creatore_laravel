<?php

namespace App\View\Components\RowTables\Admin;

use Illuminate\View\Component;

class ComponentInfoUser extends Component
{
    public $userId;
    public $userFullName;
    public function __construct($userId , $userFullName)
    {
        $this->userId = $userId;
        $this->userFullName = $userFullName;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.row-tables.admin.component-info-user');
    }
}
