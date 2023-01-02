<?php

namespace App\Http\Controllers\PanelCustomer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PanelCustomer\Panels\ListCustomerPanels;
use Illuminate\Http\Request;

class CommentPanelCustomerController extends BasePanelCustomerPanel
{
    public function __construct(ListCustomerPanels $listCustomerPanels)
    {
        $this->panelName = "comments";
        parent::__construct($listCustomerPanels);
    }


    public function deleteUserComment($comment){
        $this->panel->deleteUserComment($comment);
        return $this->redirectPanel();
    }
}
