<?php

namespace App\Http\Controllers\PanelCustomer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PanelCustomer\Panels\ListCustomerPanels;
use Illuminate\Http\Request;

class PersonalPanelCustomerController extends BasePanelCustomerPanel
{

    private $panelName = "personal-info";
    private $panel;
    public function __construct(ListCustomerPanels $listCustomerPanels)
    {
        parent::__construct($listCustomerPanels);
        $listCustomerPanels = new ListCustomerPanels();
        $this->panel = $listCustomerPanels -> searchCustomerPanel($this->panelName);
    }




    /*public function changeInfo(PanelPersionalInfoRequest $request){
        $data = $request->all();
        return $this->panel-> submitPersionalInfoClient($data);
    }




    public function sendVerifyPhoneOrEmail(PanelPersionalInfoPhoneOrEmailRequest $request){
        $input = $request->get("input");
        $type = $request->get("type");
        if ($type == "phone"){
            return $this->panel-> sendVerifyPhone($input);
        }
        else if ($type == "email"){
            return $this->panel-> sendVerifyEmail($input);
        }
    }
    public function VerifyPhoneOrEmail(PanelPersionalInfoCodeRequest $request){
        $token = $request->get("token");

        $otp = Otp::existOtpRequest($token , Auth::id());

        if (!empty($otp)){
            $code = $request->get("code");
            return $this->panel-> verifyCodeGet($otp , $code);
        }
        return false;
    }*/
}
