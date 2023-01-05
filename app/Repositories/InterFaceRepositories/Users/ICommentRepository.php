<?php
namespace App\Repositories\InterFaceRepositories\Users;

use App\Models\Users\Comment;
use App\Repositories\InterFaceRepositories\IBaseRepository;

interface ICommentRepository extends IBaseRepository {

    function AdminAnswerCommentUser(Comment $comment ,array $dataComment);

    function SearchUserComment(string $userName="" , $numInPage=15);

    function GetListComments($numInPage=10);

    function GetListCommentsAuthUser($numInPage=8);

    function DeleteSelectedCommentAuthUser($commentId);

    function SendNewCommandUser($body);
}