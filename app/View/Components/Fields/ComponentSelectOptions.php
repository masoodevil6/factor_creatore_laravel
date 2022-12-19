<?php

namespace App\View\Components\Fields;

use function dd;
use Illuminate\View\Component;

class ComponentSelectOptions extends Component
{

    public $titleEn;
    public $titleFa;
    public $disabled;

    public function __construct($titleEn="errorFieldInput" , $titleFa="errorFieldInput" , $disabled=0)
    {
        $this -> titleEn = $titleEn;
        $this -> titleFa = $titleFa;
        $this -> disabled = $disabled;
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
