<?php

namespace App\View\Components\Fields;

use Illuminate\View\Component;

class ComponentRowData extends Component
{
    public $col;
    public $title;
    public $value;
    public function __construct($title , $value , $col="col-6")
    {
        $this-> title = $title;
        $this-> value = $value;
        $this-> col = $col;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.fields.component-row-data');
    }
}
