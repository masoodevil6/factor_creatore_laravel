<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\ContextRepository;
use Illuminate\Http\Request;

class PublicApiController extends BaseApiController
{

    /* [GET]
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




    /* [POST]
     * ====================================
     *  url=> /subscribe/{subscribeSlug}
     *====================================
     *  param url = {subscribeSlug}
     * ====================================
     * OBJECT [ "id" ,"title" ,"real_price" ,"off_price" ,"duration" ,"description" ,"slug"  , "active"]
     */
    public function subscribe($subscribeSlug=""){
        return ContextRepository::SubscribeRepository()->GetInfoSubscribe( $subscribeSlug , 0);
    }



    /* [POST]
     * ====================================
     *  url=> /subscribes?{page}=
     *====================================
     *  param Get = ?page=
     * ====================================
     * LIST[OBJECT] [ "id" ,"title" ,"real_price" ,"off_price" ,"duration" ,"description" ,"slug"  , "active"]
     */
    public function subscribes(){
        return $this->CheckExistNextPag(ContextRepository::SubscribeRepository()->GetListSubscribes( 15 , 0));
    }



    /* [GET]
     * ====================================
     *  url=> /forms/{subscribeSlug}?{page}=
     *====================================
     *  param url = {subscribeSlug}
     *  param Get = ?page=
     * ====================================
     * List[object]
     */
    public function forms($subscribeSlug=""){
        return $this->CheckExistNextPag(ContextRepository::FormRepository()->GetListFormsInSubscribe($subscribeSlug));
    }


    /* [GET]
     * ====================================
     *  url=> /forms-selected
     *====================================
     *
     * ====================================
     * List[object]
     */
    public function formsSelected(){
        return ContextRepository::FormRepository()->GetLimitRandomSelectedForm();
    }



    /* [GET]
     * ====================================
     *  url=> /comments
     *====================================
     *
     * ====================================
     * List[object]
     */
    public function comments(){
        $result = ContextRepository::CommentRepository()->GetListComments();
        $export = $this->CheckExistNextPag($result);
        $export["data"] = $this->preperationCommentList($result);

        return  $export;
    }






}
