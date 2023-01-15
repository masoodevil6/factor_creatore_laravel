<?php
namespace App\Http\Services\Forms\Forms;

use App\Http\Services\Forms\BaseFormService;
use Illuminate\Support\Facades\Config;

class ReceiptNormal extends BaseFormService{


    protected function setInfoPages(){
        return [
            [
                "orientation" => Config::get("forms.Landscape") ,
                "size" => Config::get("forms.size_A6") ,
                "num" => 1
            ],
        ];
    }



    protected function setView()
    {
        return "forms.free.receipt-normal-form.index";
    }



    protected function setDescription(){
        return '
<p class=""> 
یک رسید ساده و رایگان
</p>
';
    }

}