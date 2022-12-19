<?php

namespace App\View\Components\Fields;

use Illuminate\View\Component;

class ComponentInputCheckBox extends Component
{

    public $titleEn;
    public $titleFa;
    public $url;
    public $value;

    public function __construct($titleEn="errorFieldInput" , $titleFa ="errorFieldInput" , $url="" , $value=0)
    {
        $this-> titleEn = $titleEn;
        $this-> titleFa = $titleFa;
        $this-> url = $url;
        $this-> value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.fields.component-input-check-box');
    }
}
