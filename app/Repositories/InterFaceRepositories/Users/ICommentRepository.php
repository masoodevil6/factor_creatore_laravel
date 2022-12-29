<?php
namespace App\Repositories\InterFaceRepositories\Users;

use App\Models\Users\Comment;
use App\Repositories\InterFaceRepositories\IBaseRepository;

interface ICommentRepository extends IBaseRepository {

    function AdminAnswerCommentUser(Comment $comment ,array $dataComment);

    function SearchUserComment(string $userName="" , $numInPage=15);
}