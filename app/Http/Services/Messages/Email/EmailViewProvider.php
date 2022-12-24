<?php
namespace App\Http\Services\Messages\Email;

use App\Models\Publics\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailViewProvider extends Mailable{

    use Queueable;
    use SerializesModels;

    public $details;
    public $storeName;
    public $storeEmail;

    public function __construct($details , $subject , $from , $storeName , $storeEmail)
    {
        $this->details = $details;
        $this->subject = $subject;
        $this->from = $from;

        $this->storeName = $storeName;
        $this->storeEmail = $storeEmail;
    }

    public function build(){
        $storeName = $this->storeName;
        $storeEmail = $this->storeEmail;

        return $this->subject($this->subject)->view("emails.send-otp" , compact("storeName" , "storeEmail"));
    }




}