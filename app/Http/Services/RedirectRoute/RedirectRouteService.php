<?php

namespace App\Http\Services\RedirectRoute;

class  RedirectRouteService extends RedirectRouteToolsService {


    public static function doRedirectRouteWithAlertSection(){
        self::setMsgAlertType("section");
        return new static();
    }
    public static function doRedirectRouteWithAlertSweet(){
        self::setMsgAlertType("sweet");
        return new static();
    }
    public static function doRedirectRouteWithAlertToast(){
        self::setMsgAlertType("toast");
        return new static();
    }


    public static function doRedirectRouteSuccessResult(){
        self::setMsgResultType("success");
        return new static();
    }
    public static function doRedirectRouteErrorResult(){
        self::setMsgResultType("error");
        return new static();
    }
    public static function doRedirectRouteWarningResult(){
        self::setMsgResultType("warning");
        return new static();
    }
    public static function doRedirectRouteInfoResult(){
        self::setMsgResultType("info");
        return new static();
    }


    public static function doRedirect(){
        self::setMsgType();
        return redirect(self::getRouteRedirect())->with(self::getMsgType() , self::getMsgResultText());
    }


}