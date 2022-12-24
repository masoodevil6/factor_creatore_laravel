<?php

namespace App\View\Components\RowTables\User;

use Illuminate\View\Component;

class ComponentItemTicketCategories extends Component
{
    public $ticketCategoryKey;
    public $ticketCategoryId;
    public $ticketCategoryTitle;
    public $ticketCategoryStatus;

    public function __construct($ticketCategoryKey , $ticketCategoryId , $ticketCategoryTitle , $ticketCategoryStatus)
    {
        $this->ticketCategoryKey = $ticketCategoryKey;
        $this->ticketCategoryId = $ticketCategoryId;
        $this->ticketCategoryTitle = $ticketCategoryTitle;
        $this->ticketCategoryStatus = $ticketCategoryStatus;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.row-tables.user.component-item-ticket-categories');
    }
}
