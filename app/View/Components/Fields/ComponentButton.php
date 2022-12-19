<?php

namespace App\View\Components\Fields;

use Illuminate\View\Component;

class ComponentButton extends Component
{
    public $btnType;
    public $url;
    public $title;
    public $btnColor;
    public $floatRight;
    public $btnIcon;


    public function __construct($url   , $btnType ,  $title="" , $btnColor="" ,$btnIcon="fa fa-eye" ,$floatRight=0)
    {
        $this->url = $url;
        $this->btnType = $btnType;

        $this->title = $title;
        $this->btnColor = $btnColor;
        $this->floatRight = $floatRight;
        $this->btnIcon = $btnIcon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.fields.component-button');
    }
}
