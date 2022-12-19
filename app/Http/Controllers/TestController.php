<?php

namespace App\Http\Controllers;



use App\Repositories\ContextRepository;
use App\Repositories\InterFaceRepositories\IAdminRepository;
use App\Repositories\ModelRepositories\AdminRepository;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //


    public function index(){
        $admin = ContextRepository::AdminRepository();
        dd($admin->getAllResult());
    }


}
