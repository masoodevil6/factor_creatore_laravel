<?php

namespace App\View\Components\RowTables\User;

use Illuminate\View\Component;

class ComponentItemTickets extends Component
{
    public $ticketFolderKey;
    public $ticketFolderId;
    public $ticketFolderTitle;
    public $ticketFolderUser;
    public $ticketFolderNumNotSeen;
    public $ticketFolderCategory;
    public $ticketFolderStatus;
    public $ticketFolderStatusTitle;

    public function __construct($ticketFolderKey , $ticketFolderId , $ticketFolderTitle ,  $ticketFolderUser , $ticketFolderNumNotSeen , $ticketFolderCategory , $ticketFolderStatus)
    {

        $this -> ticketFolderKey = $ticketFolderKey;
        $this -> ticketFolderId = $ticketFolderId;
        $this -> ticketFolderTitle = $ticketFolderTitle;
        $this -> ticketFolderUser = $ticketFolderUser;
        $this -> ticketFolderNumNotSeen = $ticketFolderNumNotSeen;
        $this -> ticketFolderCategory = $ticketFolderCategory;
        $this -> ticketFolderStatus = $ticketFolderStatus;

        if ($ticketFolderStatus == 1){
            $this -> ticketFolderStatusTitle = "باز";
        }
        else{
            $this -> ticketFolderStatusTitle = "بسته";
        }

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.row-tables.user.component-item-tickets');
    }
}
