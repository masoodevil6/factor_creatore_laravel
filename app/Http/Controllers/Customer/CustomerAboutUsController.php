<?php

namespace App\Http\Controllers\Customer;

use App\Repositories\ContextRepository;


class CustomerAboutUsController extends CustomerMainController
{
    public function aboutUs(){
        $nav = [
            [
                "route" => "customer.about-us" ,
                "title" => "درباره ما"
            ]
        ];

        $formsSelected = ContextRepository::FormRepository()->GetLimitRandomSelectedForm();
        $settings = $this->setting;
        $linkApps = $this->linkApps;
        $meta = ContextRepository::SeoPageRepository()->getMetaSeoSpicalAboutUs();
        $routeCanonical = route("customer.about-us");
        return view("customer.about-us.info.index" , compact("nav" , "formsSelected" , "settings" , "linkApps" , "meta" , "routeCanonical"));
    }




    public function downloadApp(){

        $nav = [
            [
                "route" => "customer.about-us-download" ,
                "title" => "دانلود برنامه ها"
            ]
        ];

        $linkApps = $this->linkApps;
        $formsSelected = ContextRepository::FormRepository()->GetLimitRandomSelectedForm();
        $meta = ContextRepository::SeoPageRepository()->getMetaSeoSpicalDownloadApps();
        $routeCanonical = route("customer.about-us-download");
        return view("customer.about-us.download.index" , compact("nav" , "linkApps" , "formsSelected" , "meta" , "routeCanonical" ));
    }
}
