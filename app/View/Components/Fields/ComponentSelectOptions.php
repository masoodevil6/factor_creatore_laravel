<?php

namespace App\View\Components\Fields;

use function dd;
use Illuminate\View\Component;

class ComponentSelectOptions extends Component
{

    public $titleEn;
    public $titleFa;
    public $disabled;
    public $method;

    public function __construct($titleEn="errorFieldInput" , $titleFa="errorFieldInput" , $disabled=0 , $method=false)
    {
        $this -> titleEn = $titleEn;
        $this -> titleFa = $titleFa;
        $this -> disabled = $disabled;
        $this -> method = $method;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.fields.component-select-options');
    }
}
