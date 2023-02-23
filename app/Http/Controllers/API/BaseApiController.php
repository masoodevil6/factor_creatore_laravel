<?php

namespace App\Http\Controllers\API;

use App\Http\Services\Login\CheckLogin;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Request;

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



    protected function preperationCommentList($comments){

        $resultExp = [];
        foreach ($comments As $itemComment){
            $comment = [
                "id" => $itemComment["id"],
                "body" => $itemComment["body"],
                "seen" => $itemComment["seen"],
                "approved" => $itemComment["approved"],
                "approved_title" => $itemComment["approved_title"],
                "status" => $itemComment["status"],
                "created_at" => jalaliDate($itemComment["created_at"]),
                "count_like" => 0,
                "like_or_dislike" => 0,
                "answer_exist" => false,
                "answer_body" => "",
                "answer_created_at" => "",
                "user_full_name" => "",
            ];

            if (isset($itemComment["count_like"]) && $itemComment["count_like"] != null){
                $comment["count_like"] =  $itemComment["count_like"] ;
            }
            if (isset($itemComment["count_like"]) && $itemComment["like_or_dislike"] != null){
                $comment["like_or_dislike"] =  $itemComment["like_or_dislike"] ;
            }

            if (isset($itemComment["answer"]["id"])){
                $comment["answer_exist"] =true ;
                $comment["answer_body"] =$itemComment["answer"]["body"] ;
                $comment["answer_created_at"] = jalaliDate($itemComment["answer"]["created_at"]) ;
            }

            if (isset($itemComment["user"]) &&  isset($itemComment["user"]["id"])){
                $comment["user_full_name"] = $itemComment["user"]["full_name"];
            }

            array_push($resultExp , $comment);
        }
        /*$export = $this->CheckExistNextPag($comments);
        $export["data"] = $resultExp;*/

        return $resultExp;
    }



}
