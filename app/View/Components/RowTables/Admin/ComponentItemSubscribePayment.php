<?php

namespace App\View\Components\RowTables\Admin;

use Illuminate\View\Component;

class ComponentItemSubscribePayment extends Component
{
    public $subscribePaymentKey;
    public $subscribePaymentId;
    public $subscribePaymentTitle;
    public $subscribePaymentUser;
    public $subscribePaymentAmount;
    public $subscribePaymentResNum;
    public $subscribePaymentStatus;
    public function __construct($subscribePaymentKey , $subscribePaymentId , $subscribePaymentTitle , $subscribePaymentUser , $subscribePaymentAmount , $subscribePaymentResNum , $subscribePaymentStatus)
    {
        $this -> subscribePaymentKey = $subscribePaymentKey;
        $this -> subscribePaymentId = $subscribePaymentId;
        $this -> subscribePaymentTitle = $subscribePaymentTitle;
        $this -> subscribePaymentUser = $subscribePaymentUser;
        $this -> subscribePaymentAmount = $subscribePaymentAmount;
        $this -> subscribePaymentResNum = $subscribePaymentResNum;
        $this -> subscribePaymentStatus = $subscribePaymentStatus;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.row-tables.admin.component-item-subscribe-payment');
    }
}
