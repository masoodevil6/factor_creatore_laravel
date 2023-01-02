<?php
namespace App\Repositories\ModelRepositories\Users;

use App\Models\Users\Comment;
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




    function GetListCommentsAuthUser($numInPage = 8)
    {
        $userId = ContextRepository::UserRepository()->GetUserAuthId();
        $comments =
            $this->model
            ->where("user_id" , $userId)
            ->where("status" , 1)
            ->orwhere("parent_id" , $userId)
            ->paginate($numInPage);
        $comments->listComment = $this->readyListPanelAndChildComments($comments);

        return $comments;
    }



    function DeleteSelectedCommentAuthUser($commentId)
    {
        $comment =  $this->model
            ->where("user_id" , ContextRepository::UserRepository()->GetUserAuthId())
            ->where("status" , 1)
            ->first();
        if (!empty($comment)){
            foreach ($comment->answers As $itemAnswer){
                $this->deleteResult($itemAnswer);
            }
            $this->deleteResult($comment);
        }
    }


    ///// =================================

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