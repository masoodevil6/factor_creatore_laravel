<?php

namespace App\Http\Controllers\PanelCustomer;

use App\Http\Controllers\PanelCustomer\Panels\ListCustomerPanels;
use App\Repositories\ContextRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class BasePanelCustomerPanel extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $listCustomerPanels;
    protected $panel;
    public $panelName = "personal-info";

    function __construct(ListCustomerPanels $listCustomerPanels)
    {
        /// list panel customer
        $this->listCustomerPanels = $listCustomerPanels;
        $this->panel = $this->listCustomerPanels -> searchCustomerPanel($this->panelName);

        $listPanels = $listCustomerPanels->getListPanel();
        View::composer("customer-panels.list-customer-panels" , function ($view) use($listPanels){
            $view->with("listPanels" , $listPanels);
        });


        /// get total setting pages
        ContextRepository::SettingRepository()->SetSettingInfoPage();
    }

}

