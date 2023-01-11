<?php
namespace App\Http\Services\Forms\Forms;

use App\Http\Services\Forms\BaseFormService;

class NormalForm extends BaseFormService{


    public function __construct($factor , $isTestFile = false)
    {
        parent::__construct($factor , $isTestFile);
        $this->num = 8;
    }


    protected function setView(): void
    {
        $this->view = "forms.normal-form";
    }


}