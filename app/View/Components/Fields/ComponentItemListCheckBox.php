<?php

namespace App\View\Components\Fields;

use Illuminate\View\Component;

class ComponentItemListCheckBox extends Component
{
    public $key;
    public $titleEn;
    public $titleFa;
    public $value;
    public $arrayValue;

    public function __construct($key , $titleEn ,$titleFa ,$value , $arrayValue)
    {
        $this->key = $key;
        $this->titleEn = $titleEn;
        $this->titleFa = $titleFa;
        $this->value = $value;
        $this->arrayValue = $arrayValue;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.fields.component-item-list-check-box');
    }
}
