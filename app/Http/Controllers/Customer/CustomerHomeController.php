<?php

namespace App\Http\Controllers\Customer;


use App\Repositories\ContextRepository;

class CustomerHomeController extends CustomerMainController
{

    public function home(){
        $nav = [];

        $formsSelected = ContextRepository::FormRepository()->GetLimitRandomSelectedForm();
        $subscribeSelected = ContextRepository::SubscribeRepository()->GetLimitRandomSelectedSubscribe();
        $comments = ContextRepository::CommentRepository()->GetListComments();

        return view("customer.home.index" , compact("nav" , "formsSelected" , "subscribeSelected" , "comments"));
    }






}
