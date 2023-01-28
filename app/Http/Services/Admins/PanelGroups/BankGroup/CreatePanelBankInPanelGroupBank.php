<?php

namespace App\Http\Services\Admins\PanelGroups\BankGroup;

use App\Http\Services\Admins\CreatePanelAdminService;

class CreatePanelBankInPanelGroupBank extends CreatePanelAdminService
{

    public function __construct()
    {
        $this->setPanelGroupName($this::class);
        $this->setPanelIcon("fa fa-bank");
        $this->setPanelName("بانک ها");
        $this->setPanelLink("admin.banks.bank.index");
        $this->insertInTablePanel();
    }

}
