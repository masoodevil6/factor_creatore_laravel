<?php

namespace App\View\Components\RowTables\Admin;

use Illuminate\View\Component;

class ComponentItemSubscribe extends Component
{
    public $subscribeKey;
    public $subscribeId;
    public $subscribeTitle;
    public $subscribePrice;
    public $subscribeDuration;
    public $subscribeDownload;
    public $subscribePlay;
    public $subscribeStatus;
    public $subscribeSelected;

    public function __construct($subscribeKey , $subscribeId , $subscribeTitle , $subscribePrice , $subscribeDuration , $subscribeDownload , $subscribePlay , $subscribeStatus , $subscribeSelected)
    {

        $this -> subscribeKey = $subscribeKey;
        $this -> subscribeId = $subscribeId;
        $this -> subscribeTitle = $subscribeTitle;
        $this -> subscribePrice = $subscribePrice;
        $this -> subscribeDuration = $subscribeDuration;
        $this -> subscribeDownload = $subscribeDownload;
        $this -> subscribePlay = $subscribePlay;
        $this -> subscribeStatus = $subscribeStatus;
        $this -> subscribeSelected = $subscribeSelected;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.row-tables.admin.component-item-subscribe');
    }
}
