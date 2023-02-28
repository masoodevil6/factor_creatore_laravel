<?php

namespace App\View\Components\Fields;

use Illuminate\View\Component;

class ComponentSkEditor extends Component
{

    public $dissplay;
    public $titleEn;
    public $titleFa;
    public $value;
    public $ckEditor;
    public $row;

    public function __construct($display = "d-block" , $titleEn="errorFieldInput" , $titleFa="errorFieldInput" , $value="errorFieldInput" , $ckEditor=1 , $row=10)
    {
        $this -> dissplay = $display;
        $this -> titleEn = $titleEn;
        $this -> titleFa = $titleFa;
        $this -> value = $value;
        $this -> ckEditor = $ckEditor;
        $this -> row = $row;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.fields.component-sk-editor');
    }
}
