<?php
namespace App\Http\Services\Forms\Forms;

use App\Http\Services\Forms\BaseFormService;

class NormalForm extends BaseFormService{


    public function __construct($factor)
    {
        parent::__construct($factor);

    }


    protected function setView(): void
    {
        $this->view = "forms.normal-form";
    }


}