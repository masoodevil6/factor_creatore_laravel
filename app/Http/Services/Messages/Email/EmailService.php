<?php
namespace App\Http\Services\Messages\Email;

use App\Http\Services\Messages\MessageInterface;
use App\Models\Publics\Setting;
use Illuminate\Support\Facades\Mail;

class EmailService implements MessageInterface {

    private $details;
    private $subject;
    private $from=[
        ["address" => null , "name" => null]
    ];
    private $to;

    private $storeName="";
    private $storeNameEn="";
    private $storeEmail="";
    function __construct()
    {
        $this->getDataSite();
    }


    public function fire()
    {
        $emailClass = new EmailViewProvider($this->details , $this->subject , $this->from , $this->storeName  , $this->storeEmail);

        Mail::to($this->to)->send($emailClass);
        return true;
    }





    public function getDetails()
    {
        return $this->details;
    }

    public function setDetails($details)
    {
        $this->details = $details;
    }



    public function getSubject()
    {
        return $this->subject;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }



    public function getFrom()
    {
        return $this->from;
    }

    public function setFrom($address="" , $name="")
    {
        $myAddress = "noReply@".$this->storeNameEn.".com";
        if ($address != ""){
            $myAddress = $address;
        }

        $myStoreName = $this->storeName;
        if ($name != ""){
            $myStoreName = $name;
        }

        $this->from = [
            ["address" => $myAddress , "name" => $myStoreName]
        ];
    }




    public function getTo()
    {
        return $this->to;
    }

    public function setTo($to)
    {
        $this->to = $to;
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