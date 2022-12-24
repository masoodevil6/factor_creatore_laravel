<?php

namespace App\Http\Services\Messages\SMS;

use App\Http\Services\Messages\MessageInterface;
use App\Models\Publics\Setting;
use Illuminate\Support\Facades\Config;

class SmsService implements MessageInterface {

    private $from;
    private $text;
    private $to;
    private $isFlash = true;



    private $storeName="";
    private $storeNameEn="";
    private $storeEmail="";
    function __construct()
    {
        $this->getDataSite();
    }



    public function fire()
    {
        $meliPayamak = new MeliPayamakService();
        return $meliPayamak->sendSmsSoapClient($this->from , $this->to ,$this->text ,  $this->isFlash );
    }



    public function getFrom()
    {
        return $this->from;
    }

    public function setFrom($from="")
    {
        $this->from = $from;
        if ($from == ""){
            $this->from = Config::get("sms.otf_from");
        }
    }




    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = "مجموعه ".$this->storeName."\n".$text;
    }


    /**
     * @return mixed
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param mixed $to
     */
    public function setTo($to)
    {
        $this->to = $to;
    }

    /**
     * @return bool
     */
    public function isFlash()
    {
        return $this->isFlash;
    }

    /**
     * @param bool $isFlash
     */
    public function setIsFlash($isFlash)
    {
        $this->isFlash = $isFlash;
    }



    ////===============================
    /// model
    /// ===============================
    private function getDataSite(){
        $storeData = Setting::whereIn("titleEn" , ["site_name" , "site_name_en" , "site_email"])->get();
        foreach ($storeData As $itemStore){
            if ($itemStore->titleEn == "site_name"){
                $this->storeName = $itemStore->value;
            }
            if ($itemStore->titleEn == "site_name_en"){
                $this->storeNameEn = $itemStore->value;
            }
            if ($itemStore->titleEn == "site_email"){
                $this->storeEmail = $itemStore->value;
            }
        }
    }

}