<?php
namespace App\Repositories\ModelRepositories\Users;

use App\Models\Users\Comment;
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
}