<?php

namespace App\Http\Controllers;

use App\Repositories\ContextRepository;
use Illuminate\Http\Request;

class TestController extends Controller
{



    public function index(){


        $admin = ContextRepository::PanelGroupRepository();

        //dump($adminModel->getCreateAt());
        dump($admin->getAllResult());


    }


}
