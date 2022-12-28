<?php

namespace App\View\Components\RowTables\Admin;

use Illuminate\View\Component;

class ComponentItemFormAdmin extends Component
{

    public $formKey;
    public $formId;
    public $formName;
    public $formImage = "";
    public $formCategory;
    public $formSubscribe;
    public $formClass;
    public $formStatus;

    public function __construct($formKey , $formId , $formName, $formImage, $formCategory , $formSubscribe, $formClass, $formStatus)
    {
        $this -> formKey = $formKey;
        $this -> formId = $formId;
        $this -> formName = $formName;

        if (!empty($formImage)){
            $this -> formImage = $formImage["indexArray"][$formImage["currentImage"]];
        }

        $this -> formCategory = $formCategory;
        $this -> formSubscribe = $formSubscribe;
        $this -> formClass = $formClass;
        $this -> formStatus = $formStatus;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.row-tables.admin.component-item-form-admin');
    }
}
