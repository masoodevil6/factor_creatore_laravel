<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ComponentSliderSelectedForms extends Component
{
    public  $formsSelected;
    public function __construct($formsSelected)
    {
        $this-> formsSelected = $formsSelected;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.component-slider-selected-forms');
    }
}
