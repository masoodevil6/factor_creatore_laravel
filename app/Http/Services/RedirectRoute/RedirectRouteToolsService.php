<?php

namespace App\Http\Services\RedirectRoute;

use Illuminate\Support\Facades\Facade;
use function in_array;

class RedirectRouteToolsService extends Facade {

    protected static $msgResultText = "";
    protected static $routeRedirect = "";
    protected static $msgAlertType = "section";
    protected static $msgResultType = "success";

    protected static $msgType = "";



    protected static function getMsgResultText()
    {
        return self::$msgResultText;
    }

    public static function setMsgResultText($msgResultText)
    {
        self::$msgResultText = $msgResultText;
        return new static();
    }





    protected static function getRouteRedirect()
    {
        return self::$routeRedirect;
    }

    public static function setRouteRedirect($routeRedirect)
    {
        self::$routeRedirect = $routeRedirect;
        return new static();
    }





    protected static function getMsgAlertType()
    {
        return self::$msgAlertType;
    }

    protected static function setMsgAlertType($msgAlertType)
    {
        $arrayExist = ["section" , "sweet" , "toast"];
        $defaultAlertType = $arrayExist[0];
        if (in_array($msgAlertType , $arrayExist)){
            $defaultAlertType = $msgAlertType;
        }

        self::$msgAlertType = $defaultAlertType;
    }






    protected static function getMsgResultType()
    {
        return self::$msgResultType;
    }

    protected static function setMsgResultType($msgResultType)
    {
        $arrayExist = ["success" , "error" , "warning" , "info"];
        $defaultResultType = $arrayExist[0];
        if (in_array($msgResultType , $arrayExist)){
            $defaultResultType = $msgResultType;
        }

        self::$msgResultType = $defaultResultType;
    }






    protected static function getMsgType()
    {
        return self::$msgType;
    }

    protected static function setMsgType()
    {
        self::$msgType = "alert-".self::getMsgAlertType()."-".self::getMsgResultType();
    }







}