<?php

namespace App\View\Components\Fields;

use Illuminate\View\Component;

class ComponentFormListProperties extends Component
{

    public $titleEn;
    public $titleFa;
    public $titleTag;
    public $valueTag;
    public function __construct($titleEn , $titleFa , $titleTag="" , $valueTag = "")
    {
        $this->titleFa = $titleFa;
        $this->titleEn = $titleEn;
        $this->titleTag = $titleTag;
        $this->valueTag = $valueTag;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.fields.component-form-list-properties');
    }
}
