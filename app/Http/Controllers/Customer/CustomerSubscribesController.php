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
        $meta = ContextRepository::SeoPageRepository()->getMetaSeoSpicalListSubscribes();
        $routeCanonical = route("customer.subscribes.list");
        return view("customer.subscribes.subscribe-list.index" , compact("nav" , "subscribes" , "meta" , "routeCanonical"));
    }



    public function info($slug){
        $subscribe = ContextRepository::SubscribeRepository()->GetInfoSubscribe($slug);
        if (!empty($subscribe)){
            $nav = [
                [
                    "route" => "customer.subscribes.list" ,
                    "title" => "لیست اشتراک ها "
                ] ,
                [
                    "route" => "customer.subscribes.info" ,
                    "valueRoute" => $subscribe->slug,
                    "title" => "اشتراک: ".$subscribe->title
                ]
            ];
            $meta = ContextRepository::SeoMetaRepository()->getDataSeoMeta($subscribe->metaInfo);
            $routeCanonical = route("customer.subscribes.info" , [$subscribe->slug]);
            return view("customer.subscribes.subscribe-info.index" , compact("nav" , "subscribe" , "meta" , "routeCanonical" ));
        }
        else{
            return redirect()->route("customer.subscribes.list");
        }
    }



}
