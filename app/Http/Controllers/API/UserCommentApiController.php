<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\ContextRepository;
use Illuminate\Http\Request;

class UserCommentApiController extends BaseApiController
{

    /* [POST]
     * ====================================
     *  url=> /user/comments/list
     *====================================
     *
     * ====================================
     *  list [OBJECT ]
     */
    public function listComments(Request $request){
        $comments = ContextRepository::CommentRepository()->GetListCommentsAuthUser();

        $resultList = [];
        foreach ($comments -> listComment as $itemComment){
            $res = [
                "id" => $itemComment["comment"]["id"],
                "body" => $itemComment["comment"]["body"],
                "seen" => $itemComment["comment"]["seen"],
                "approved" => $itemComment["comment"]["approved"],
                "approved_title" => $itemComment["comment"]["approved_title"],
                "status" => $itemComment["comment"]["status"],
                "created_at" => $itemComment["comment"]["created_at"],
                "answer_exist" => false,
                "answer_body" => "",
                "answer_created_at" => "",
            ];

            if (sizeof($itemComment["answers"]) > 0){
                $res["answer"]= [
                    "id" => $itemComment["answers"][0]["id"] ,
                    "body" => $itemComment["answers"][0]["body"] ,
                    "created_at" => $itemComment["answers"][0]["created_at"] ,
                ];
            }

            array_push($resultList ,$res );
        }
        $export = $this->CheckExistNextPag($comments);
        $export["data"] = $this->preperationCommentList($resultList);
        return $export;
    }


    /* [POST]
     * ====================================
     *  url=> /user/comments/delete
     *====================================
     *  param [commentId]
     * ====================================
     *  String[msg]
     */
    public function deleteComment(Request $request){
        if ( $request->has("commentId")){
            $commentId = $request->get("commentId");
            ContextRepository::CommentRepository()->DeleteSelectedCommentAuthUser($commentId);
            return "نظر با موفقیت حذف شد";
        }

        return response("" , 404);
    }





    /* [POST]
     * ====================================
     *  url=> /user/comments/like-or-dislike-comment
     *====================================
     * param [commentId] - [likeOrDislike]
     * ====================================
     * OBJECT[ "commentId" , "likeOrDislike" ]
     */
    public function likeOrDislikeComment(Request $request){
        if ( $request->has("commentId") && $request->has("likeOrDislike")){
            $commentId = $request->get("commentId");
            $likeOrDislike = $request->get("likeOrDislike");
            return ContextRepository::CommentLikeRepository()->LikeOrDislikeCommentWithAuthUser($commentId , $likeOrDislike);
        }

        return response("" , 404);
    }



    /* [POST]
     * ====================================
     *  url=> /user/comments/send
     *====================================
     * param [body]
     * ====================================
     * String[msg]
     */
    public function sendComment(Request $request){
        if ( $request->has("body")){
            $body = $request->get("body");
            ContextRepository::CommentRepository()->SendNewCommandUser($body);
            return "نظر جدید با موفقیت ثبت شد";
        }

        return response("" , 404);
    }
}
