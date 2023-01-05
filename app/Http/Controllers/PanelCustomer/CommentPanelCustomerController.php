<?php

namespace App\Http\Controllers\PanelCustomer;

use App\Http\Controllers\PanelCustomer\Panels\ListCustomerPanels;

use App\Http\Requests\Customer\CommandAuthRequest;
use App\Http\Requests\Customer\CommandLikeAuthRequest;

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


    public function SendNewCommandUser(CommandAuthRequest $request){
        $this->panel->SendNewCommandUser( $request->get("body"));
        return $this->redirectPanel();
    }


    public function likeOrDislikeCommand(CommandLikeAuthRequest $request){
        return $this->panel->likeOrDislikeCommand($request->get("comment_id") , $request->get("like_or_dislike"));
    }
}
