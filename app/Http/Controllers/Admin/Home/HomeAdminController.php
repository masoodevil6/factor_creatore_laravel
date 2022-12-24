<?php

namespace App\Http\Controllers\Admin\Home;


use App\Http\Controllers\Admin\MainAdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;


class HomeAdminController extends MainAdminController
{

    function __construct()
    {
        parent::__construct(route("admin.home"));
    }

    public function index(){

        $nav = [
            "part"=> "",
            "navigation" =>[]
        ];

        return view("admin.home.index" , compact("nav"));
    }

}
