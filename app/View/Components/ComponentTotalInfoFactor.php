<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ComponentTotalInfoFactor extends Component
{

    public $factorInfo;
    public $products;
    public $totalPrice;
    public function __construct($factorInfo , $products , $totalPrice)
    {
        $this->factorInfo = $factorInfo;
        $this->products = $products;
        $this->totalPrice = $totalPrice;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.component-total-info-factor');
    }
}
