<?php

namespace App\Http\Controllers\API;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class BaseApiController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    protected function CheckExistNextPag($dataPaginate){

        /*$currentPage = $dataPaginate->currentPage();
        $perPage = $dataPaginate->perPage();
        $total = $dataPaginate->total();

        $existPage = false;
        if ($currentPage * $perPage < $total){
            $existPage = true;
        }*/

        $resultExp = [
            "current_page" => $dataPaginate->currentPage() ,
            "per_page" => $dataPaginate->perPage() ,
            "total" => $dataPaginate->total() ,
            "exist_next_page" => $dataPaginate->hasMorePages(),
            "data" => $dataPaginate->items(),
        ];

        return $resultExp;
    }

}
