<?php
namespace App\Repositories\ModelRepositories\Users;

use App\Models\Users\Comment;
use App\Repositories\InterFaceRepositories\Users\ICommentRepository;
use App\Repositories\ModelRepositories\BaseRepository;

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
}