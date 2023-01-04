<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Repositories\ContextRepository;
use Illuminate\Http\Request;

class CustomerHomeController extends CustomerMainController
{

    public function home(){

        $formsSelected = ContextRepository::FormRepository()->GetLimitRandomSelectedForm();
        $subscribeSelected = ContextRepository::SubscribeRepository()->GetLimitRandomSelectedSubscribe();
        $comments = ContextRepository::CommentRepository()->GetListComments();

        return view("customer.home.index" , compact("formsSelected" , "subscribeSelected" , "comments"));
    }

}
