<?php

namespace App\View\Components\Fields;

use function dd;
use Illuminate\View\Component;

class ComponentBtnStatus extends Component
{
    public $titleEn;
    public $titleFa;
    public $title;
    public $method;
    public $url;
    public $value;
    public $reverse;
    public $positiveValue;
    public $negativeValue;
    public function __construct($titleEn , $titleFa  , $url , $value , $reverse="false" , $title="تایید" , $method ="" ,
                                $positiveValue = 1 , $negativeValue = 0)
    {


        $this -> titleEn = $titleEn;
        $this -> method = $method;
        if ($method ==""){
            $this -> method = $titleEn;
        }
        $this -> titleFa = $titleFa;
        $this -> title = $title;
        $this -> url = $url;
        $this -> value = $value;
        $this -> reverse = $reverse;

        $this -> positiveValue = $positiveValue;
        $this -> negativeValue = $negativeValue;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.fields.component-btn-status');
    }
}
