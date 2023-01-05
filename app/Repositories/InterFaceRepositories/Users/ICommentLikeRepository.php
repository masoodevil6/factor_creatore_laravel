<?php
namespace App\Repositories\InterFaceRepositories\Users;

use App\Repositories\InterFaceRepositories\IBaseRepository;

interface ICommentLikeRepository extends IBaseRepository {

    function LikeOrDislikeCommentWithAuthUser(int $commentId , int $likeOrDislike = 1);

    function GetQueryLikeOrDisclikCommentWithAuthUser($commentId);

    function GetQueryCountLikeComment($commentId);

    function GetCountLikeComment($commentId);

}