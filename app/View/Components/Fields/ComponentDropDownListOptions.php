<?php

namespace App\View\Components\Fields;

use Illuminate\View\Component;

class ComponentDropDownListOptions extends Component
{
    public $titleFa;
    public $titleEn;
    public function __construct($titleFa , $titleEn="exampleDropDown")
    {
        $this ->titleFa = $titleFa;
        $this ->titleEn = $titleEn;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.fields.component-drop-down-list-options');
    }
}
