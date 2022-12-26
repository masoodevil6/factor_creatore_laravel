<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\MainAdminController;
use App\Http\Services\Forms\Forms\NormalForm;
use App\Repositories\ContextRepository;
use Illuminate\Http\Request;
use League\Flysystem\Exception;

class CreatePDFController extends MainAdminController
{

    function __construct()
    {
        parent::__construct(route("admin.forms.form.index"));
    }



    public function index(){

        $factor = ContextRepository::FactorRepository()->getResult(1);

        $nameSpaceClass = $factor->form->class;

        try{
            $instance = (new \ReflectionClass($nameSpaceClass))->newInstance($factor);
            $file = $instance->ToPdf();
        }
        catch (Exception $e){
            return null;
        }

    }

}
