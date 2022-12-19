<?php

namespace App\View\Components\Fields;

use Illuminate\View\Component;

class ComponentInputTags extends Component
{

    public $titleEn;
    public $titleFa;
    public $value;
    public function __construct($titleEn="errorFieldInput" , $titleFa="errorFieldInput" , $value="")
    {
        $this -> titleEn = $titleEn;
        $this -> titleFa = $titleFa;
        $this -> value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.fields.component-input-tags');
    }
}
