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
   *  url=> /forms/{subscribeSlug}?{page}=
   *====================================
   *  param url = {subscribeSlug}
   *  param Get = ?page=
   * ====================================
   * "siteName" => [ "site_name_fa" , "site_name_en" ]
   */
    public function forms($subscribeSlug=""){
        return $this->CheckExistNextPag(ContextRepository::FormRepository()->GetListFormsInSubscribe($subscribeSlug));
    }


    /*
   * ====================================
   *  url=> /subscribes?{page}=
   *====================================
   *  param Get = ?page=
   * ====================================
   * "siteName" => [ "id" ,"title" ,"real_price" ,"off_price" ,"duration" ,"description" ,"slug"  ]
   */
    public function subscribes(){
        return $this->CheckExistNextPag(ContextRepository::SubscribeRepository()->GetListSubscribes( 15 , 0));
    }


}
