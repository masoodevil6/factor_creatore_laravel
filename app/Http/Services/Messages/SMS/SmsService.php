<?php

namespace App\Http\Services\Messages\SMS;

use App\Http\Interfaces\MessageInterface;

class SmsService implements MessageInterface {

    private $from;
    private $text;
    private $to;
    private $isFlash = true;

    public function fire()
    {
        $meliPayamak = new MeliPayamakService();
        return $meliPayamak->sendSmsSoapClient($this->from , $this->to ,$this->text ,  $this->isFlash );
    }



    public function getFrom()
    {
        return $this->from;
    }

    public function setFrom($from)
    {
        $this->from = $from;
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
        $this->text = $text;
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




}