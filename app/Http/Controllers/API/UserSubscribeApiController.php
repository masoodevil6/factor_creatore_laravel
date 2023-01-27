<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\ContextRepository;
use Illuminate\Http\Request;

class UserSubscribeApiController extends Controller
{
    /*
     * ====================================
     *  url=> /user/subscribes/actives
     *====================================
     * post => formId
     * ====================================
     * object factors
     */
    public function ListUserSubscribesActive(){
        $subscribesActive = ContextRepository::SubscribePaymentRepository()->GetSubscribeActiveNowWithTimeStamp();
        foreach ($subscribesActive As $key=>$item){
            $subscribesActive[$key]["time_set_text"] = jalaliDate($item["time_set"]);
            $subscribesActive[$key]["time_end_text"] = jalaliDate($item["time_end"]);
        }
        return $subscribesActive;
    }
}
