<?php

namespace App\View\Components\Fields;

use function dd;
use Illuminate\View\Component;

class ComponentFormFilterJson extends Component
{
    public $method;
    public $url;
    public function __construct($method="search"  , $url="" )
    {

        $this->method = $method;
        $this->url = $url;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.fields.component-form-filter-json');
    }
}
