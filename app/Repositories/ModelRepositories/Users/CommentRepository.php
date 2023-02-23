<?php
namespace App\Repositories\ModelRepositories\Users;

use App\Models\Users\Comment;
use App\Models\Users\CommentLike;
use App\Repositories\ContextRepository;
use App\Repositories\InterFaceRepositories\Users\ICommentRepository;
use App\Repositories\ModelRepositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class CommentRepository extends BaseRepository implements ICommentRepository {

    public function __construct()
    {
        parent::__construct(new Comment());
    }


    function AdminAnswerCommentUser(Comment $comment, array $dataComment)
    {
        $answers = $comment->answers;
        if (!empty($answers)){
            foreach ($answers As $itemAnswer){
                $this->deleteResult($itemAnswer);
            }
        }

        $this->addResult($dataComment);
    }


    function SearchUserComment(string $userName = "", $numInPage = 15)
    {
        if ($userName != ""){
            $this->model = $this->model->join('users', function($join) use ($userName){

                $join->on('comments.user_id', "=", 'users.id');

                $join
                    ->where(DB::raw("CONCAT(users.`name`, ' ', users.`family`)")  , "like" , $userName."%")
                    ->orWhere(DB::raw("CONCAT(users.`name`, ' ', users.`family`)")  , "like" , "%".$userName)
                    ->orWhere(DB::raw("CONCAT(users.`name`, ' ', users.`family`)")  , "like" , "%".$userName."%")
                    ->orWhere(DB::raw("CONCAT(users.`name`, ' ', users.`family`)")  , "like" , $userName);
            });
        }

        return $this->model->paginate($numInPage);
    }


    function GetListComments($numInPage = 10)
    {

        $result = $this->model
            ->select([
                "comments.*" ,
                ])
            ->addSelect([
                "count_like" =>  ContextRepository::CommentLikeRepository()->GetQueryCountLikeComment("comments.id") ,
                "like_or_dislike" =>  ContextRepository::CommentLikeRepository()->GetQueryLikeOrDisclikCommentWithAuthUser("comments.id") ,
            ])
            ->with(["answer" , "user"])
            ->whereRaw('comments.parent_id is null')
            ->where("comments.status" , 1)
            ->where("comments.approved" , 1)
            ->paginate($numInPage);

        $result->list = $this->readyListParentAndAnswerComments($result);

        return $result;
    }




    function GetListCommentsAuthUser($numInPage = 8)
    {
        $userId = ContextRepository::UserRepository()->GetUserAuthId();
        $comments =
            $this->model
                ->where("user_id" , $userId)
                ->where("status" , 1)
                ->orderby("id" , "desc")
                ->paginate($numInPage);

        $comments->listComment = $this->readyListPanelAndChildComments($comments);

        return $comments;
    }


    function DeleteSelectedCommentAuthUser($commentId)
    {
        $comment =  $this->model
            ->where("user_id" , ContextRepository::UserRepository()->GetUserAuthId())
            ->where("status" , 1)
            ->where("id" , $commentId)
            ->first();
        if (!empty($comment)){
            foreach ($comment->answers As $itemAnswer){
                $this->deleteResult($itemAnswer);
            }
            $this->deleteResult($comment);
        }
    }



    function SendNewCommandUser($body)
    {
        return $this->addResult([
            "body" => $body ,
            "user_id" => ContextRepository::UserRepository()->GetUserAuthId() ,
            "approved" => 0 ,
            "status" => 1 ,
        ]);
    }



    ///// =================================


    private function readyListParentAndAnswerComments($comments){

        $resultExp = [];
        foreach ($comments As $itemParentComment){
            $existParentComment = false;
            foreach ($resultExp as $item){
                if ($item["parent"]["id"] == $itemParentComment->id){
                    $existParentComment=true;
                    break;
                }
            }

            if (!$existParentComment){

                $result = [
                    "parent" =>
                        [
                            "id" => $itemParentComment->id ,
                            "body" => $itemParentComment->body ,
                            "created_at" => jalaliDate($itemParentComment->created_at),
                            "user" => $itemParentComment->user->fullName ,
                            "count_like" =>  0 ,
                            "like_or_dislike" =>  $itemParentComment->like_or_dislike ,
                        ],
                    "answer"=>[]
                ];

                if ($itemParentComment->count_like  != null){
                    $result["parent"]["count_like"] = $itemParentComment->count_like ;
                }

                if (!empty($itemParentComment->answer)){
                    $result["answer"] = [
                        "id" => $itemParentComment ->answer -> id ,
                        "body" => $itemParentComment ->answer -> body ,
                        "created_at" => $itemParentComment ->answer -> created_at ,
                    ];
                }

                array_push($resultExp , $result);

            }
        }
        return $resultExp;
    }

    private function readyListPanelAndChildComments($comments){
        $resultExp = [];

        $parents=[];
        foreach ($comments As $itemComments){
            if ($itemComments->parent_id == null && $itemComments->user_id != null){
                array_push($parents , $itemComments);
            }
        }

        foreach ($parents as $itemParent){

            $answers = [];
            foreach ($comments as $itemComment){
                if ($itemComment->parent_id == $itemParent->id){
                    array_push($answers , $itemComment);
                }
            }

            $res = [
                "comment" => $itemParent ,
                "answers" => $answers
            ];
            array_push($resultExp , $res);
        }

        return $resultExp;

    }


}

