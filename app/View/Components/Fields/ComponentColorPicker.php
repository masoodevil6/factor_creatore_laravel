<?php

namespace App\View\Components\Fields;

use Illuminate\View\Component;

class ComponentColorPicker extends Component
{
    public $titleEn;
    public $titleFa;
    public $value;

    public function __construct($titleEn , $titleFa , $value)
    {
        $this -> titleEn = $titleEn;
        $this -> titleFa = $titleFa;
        $this -> value = $value;
    }


    public function render()
    {
        return view('components.fields.component-color-picker');
    }
}
