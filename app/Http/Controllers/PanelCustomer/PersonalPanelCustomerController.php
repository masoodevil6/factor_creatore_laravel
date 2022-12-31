<?php

namespace App\Http\Controllers\PanelCustomer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PanelCustomer\Panels\ListCustomerPanels;
use App\Http\Requests\CustomerPanel\PanelPersionalInfoCodeRequest;
use App\Http\Requests\CustomerPanel\PanelPersionalInfoPhoneOrEmailRequest;
use App\Http\Requests\CustomerPanel\PanelPersionalInfoRequest;
use App\Repositories\ContextRepository;
use Illuminate\Http\Request;

class PersonalPanelCustomerController extends BasePanelCustomerPanel
{

    public function __construct(ListCustomerPanels $listCustomerPanels)
    {
        $this->panelName = "personal-info";
        parent::__construct($listCustomerPanels);
    }

    public function changeInfo(PanelPersionalInfoRequest $request){
        return $this->panel-> submitPersionalInfoClient($request->get("name") , $request->get("family"));
    }

    public function sendVerifyPhoneOrEmail(PanelPersionalInfoPhoneOrEmailRequest $request){
        return $this->panel-> sendVerifyCode($request->get("type") , $request->get("input"));
    }

    public function VerifyPhoneOrEmail(PanelPersionalInfoCodeRequest $request){
        return $this->panel-> verifyCodeGet($request->get("token") , $request->get("code"));
    }
}
