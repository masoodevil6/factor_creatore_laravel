<?php
namespace App\Http\Services\Messages;


class MessageService {

    public $message;

    function __construct(MessageInterface $message)
    {
        $this->message = $message;
    }

    public function send(){
       return $this -> message -> fire();
    }
}