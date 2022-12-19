<?php

namespace App\View\Components\Fields;

use function dd;
use function dump;
use Illuminate\View\Component;

class ComponentInputInsert extends Component
{

    public $titleEn;
    public $titleFa;
    public $type;
    public $value;
    public function __construct($titleEn="errorFieldInput" , $titleFa="errorFieldInput"  , $value="errorFieldInput" ,  $type = "text")
    {
        $this -> titleEn = $titleEn;
        $this -> titleFa = $titleFa;
        $this -> value = $value;
        $this -> type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        return view('components.fields.component-input-insert');
    }
}
