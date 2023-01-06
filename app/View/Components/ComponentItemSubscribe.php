<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ComponentItemSubscribe extends Component
{
    public $subscribes;
    public function __construct($subscribes)
    {
        $this -> subscribes = $subscribes;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.component-item-subscribe');
    }
}
