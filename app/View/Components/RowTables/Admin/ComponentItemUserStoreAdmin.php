<?php

namespace App\View\Components\RowTables\Admin;

use Illuminate\View\Component;

class ComponentItemUserStoreAdmin extends Component
{


    public $userStoreKey;
    public $userStoreId;
    public $userStoreName;
    public $userStorePhone;
    public $userStoreAddress;
    public $userStoreUserName = "";
    public function __construct($userStoreKey , $userStoreId , $userStoreName , $userStorePhone , $userStoreAddress , $userStoreUser)
    {
        $this ->userStoreKey =$userStoreKey;
        $this ->userStoreId =$userStoreId;
        $this ->userStoreName =$userStoreName;
        $this ->userStorePhone =$userStorePhone;
        $this ->userStoreAddress =$userStoreAddress;

        if (!empty($userStoreUser)){
            $this ->userStoreUserName = $userStoreUser->fullName;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.row-tables.admin.component-item-user-store-admin');
    }
}
