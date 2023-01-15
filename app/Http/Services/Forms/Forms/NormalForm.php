<?php
namespace App\Http\Services\Forms\Forms;

use App\Http\Services\Forms\BaseFormService;
use Illuminate\Support\Facades\Config;

class NormalForm extends BaseFormService{


    protected function setInfoPages(){
        return [
            [
                "orientation" => Config::get("forms.vertical") ,
                "size" => Config::get("forms.size_A4") ,
                "num" => 12
            ],
            [
                "orientation" => Config::get("forms.Landscape") ,
                "size" => Config::get("forms.size_A5") ,
                "num" => 6
            ],
        ];
    }



    protected function setView()
    {
        return "forms.free.normal-form.index";
    }



    protected function setDescription(){
        return '
<p class=""> 
یک فرم فاکتور ساده و رایگان برای تحویل سریع به مشتریان
</p>
';
    }

}