<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Repositories\ContextRepository;
use Illuminate\Http\Request;

class CustomerSubscribesController extends CustomerMainController
{

    public function list(){

        $nav = [
            [
                "route" => "customer.subscribes.list" ,
                "title" => "لیست اشتراک ها "
            ]
        ];

        $subscribes = ContextRepository::SubscribeRepository()->GetListSubscribes();

        return view("customer.subscribes.subscribe-list.index" , compact("nav" , "subscribes"));
    }



    public function info($slug){
        $subscribe = ContextRepository::SubscribeRepository()->GetInfoSubscribe($slug);
        if (sizeof($subscribe)>0){
            $nav = [
                [
                    "route" => "customer.subscribes.list" ,
                    "title" => "لیست اشتراک ها "
                ] ,
                [
                    "route" => "customer.subscribes.info" ,
                    "valueRoute" => $subscribe->info["slug"] ,
                    "title" => "اشتراک: ".$subscribe->info["title"]
                ]
            ];
            return view("customer.subscribes.subscribe-info.index" , compact("nav" , "subscribe"));
        }
        else{
            return redirect()->route("customer.subscribes.list");
        }
    }

}
