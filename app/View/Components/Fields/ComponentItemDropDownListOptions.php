<?php

namespace App\View\Components\Fields;

use Illuminate\View\Component;

class ComponentItemDropDownListOptions extends Component
{
    public $url;
    public $icon;
    public $title;
    public function __construct($url="" , $icon="" , $title="")
    {
        $this ->url = $url;
        $this ->icon = $icon;
        $this ->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.fields.component-item-drop-down-list-options');
    }
}
