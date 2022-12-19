<?php

namespace App\View\Components\Fields;

use Illuminate\View\Component;

class ComponentItemListProperties extends Component
{
    public $titleEn;
    public $key;

    public $titleTag;
    public $title;

    public $valueTag;
    public $value;

    public $showDelete;


    public function __construct($titleEn="example", $key=0 ,
                                $titleTag="title" , $titleTagPlaceholder="عنوان" , $title="" ,
                                $valueTag="value" , $valueTagPlaceholder="مقدار" , $value="" ,
                                $showDelete=true)
    {
        $this->titleTag = $titleTag;
        $this->key = $key;

        $this->titleEn = $titleEn;
        $this->titleTagPlaceholder = $titleTagPlaceholder;
        $this->title = $title;

        $this->valueTag = $valueTag;
        if ($this->valueTag == ""){
            $this->valueTag = "value";
        }

        $this->valueTagPlaceholder = $valueTagPlaceholder;
        $this->value = $value;
        $this->showDelete = $showDelete;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.fields.component-item-list-properties');
    }
}
