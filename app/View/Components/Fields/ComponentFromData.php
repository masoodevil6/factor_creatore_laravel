<?php

namespace App\View\Components\Fields;

use function dd;
use Illuminate\View\Component;

class ComponentFromData extends Component
{
    public $action;
    public $method;
    public $enctype;
    public $btnTitle;
    public $preventSubmit;

    public function __construct($action="" , $method="post" , $enctype="" , $btnTitle="ثبت" , $preventSubmit=0)
    {
        $this-> action = $action;
        $this-> method = $method;
        $this-> enctype = $enctype;
        $this-> btnTitle = $btnTitle;
        $this-> preventSubmit = $preventSubmit;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.fields.component-from-data');
    }
}
