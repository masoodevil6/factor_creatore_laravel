<?php
namespace App\Http\Controllers\PanelCustomer\Panels\PanelCustomer;

use App\Http\Controllers\PanelCustomer\Panels\InterfacePanelCustomer\IPanelFactorCustomer;
use App\Http\Services\Forms\BaseFormToolService;
use App\Http\Services\Forms\FactorService;
use App\Repositories\ContextRepository;

class PanelFactorCustomer extends BasePanelCustomer implements IPanelFactorCustomer {

    public function __construct()
    {
        $this->setTitleFa("فاکتورها");
        $this->setTitleEn("factors");
        $this->setIcon("fa fa-books");
    }


    public function returnPanelView()
    {
        $titleFa = $this->getTitleFa();
        $titleEn = $this->getTitleEn();
        $realFactor = ContextRepository::FactorRepository()->GetFactorAuthAuthUser();
        $factors = $this->generateListDataFactors($realFactor);
        return view("customer-panels.panels.panel-factors.index" , compact("titleFa" , "titleEn" ,  "factors" , "realFactor"))->render();
    }

    public function getInfoUserFactor($userFactorResNum){
        $factor = $this->generateDataFactor(ContextRepository::FactorRepository()->GetInfoSelectedFactorAuthUser($userFactorResNum));
        return view("customer-panels.panels.panel-factors.show-factor" , compact(  "factor"))->render();
    }

    public function downloadUserFactor($userFactorResNum){
        $factor = ContextRepository::FactorRepository()->GetInfoSelectedFactorAuthUser($userFactorResNum);
        $factorService = new FactorService();
        return $factorService->downloadFactor($factor);
    }

    public function deleteUserFactor($userFactorResNum){
        ContextRepository::FactorRepository()->DeleteSelectedFactorAuthUser($userFactorResNum);
    }




    //// ================================================================

    private function generateListDataFactors($factors){
        $resultExp = [];
        foreach ($factors as $itemFactor){
            array_push($resultExp , $this->generateDataFactor($itemFactor));
        }
        return $resultExp;
    }

    private function generateDataFactor($factor){
        return  new BaseFormToolService($factor);
    }

}