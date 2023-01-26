<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\ContextRepository;
use Illuminate\Http\Request;

class PublicApiController extends BaseApiController
{

    /*
     * ====================================
     *  url=> /about-us
     *====================================
     *
     * ====================================
     * "siteName" => [ "site_name_fa" , "site_name_en" ]
     * "aboutUs" => ""
     * "infoSite" => [ "address" , "site_email" , "site_phone" ]
     * "socials" => [  ["url" , "title" , "icon" , "Social"] , ....  ]
     */
    public function aboutUs(){
        return ContextRepository::SettingRepository()->SetSettingInfoPage(true);
    }



    /*
   * ====================================
   *  url=> /forms?page=
   *====================================
   *
   * ====================================
   * "siteName" => [ "site_name_fa" , "site_name_en" ]
   */
    public function forms(){
       return $this->CheckExistNextPag(ContextRepository::FormRepository()->SearchForm());
    }


}
