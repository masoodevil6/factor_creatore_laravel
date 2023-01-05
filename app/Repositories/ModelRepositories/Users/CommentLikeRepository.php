<?php
namespace App\Repositories\ModelRepositories\Users;

use App\Models\Users\CommentLike;
use App\Repositories\ContextRepository;
use App\Repositories\InterFaceRepositories\Users\ICommentLikeRepository;
use App\Repositories\ModelRepositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class CommentLikeRepository extends BaseRepository implements ICommentLikeRepository {

    public function __construct()
    {
        parent::__construct(new CommentLike());
    }



    function LikeOrDislikeCommentWithAuthUser(int $commentId, int $likeOrDislike=1)
    {

        $lastCommentLike =
            $this->model
                ->where("comment_id" , $commentId)
                ->where("user_id" , ContextRepository::UserRepository()->GetUserAuthId())
                ->first();

        $newLikeOrDislike = $this->returnStatusLikeOrDislike($lastCommentLike , $likeOrDislike);

        if (!empty($lastCommentLike)){
            $this->deleteResult($lastCommentLike);
        }

        if ($this->checkStatusLikeOrDislike($newLikeOrDislike)){
            $this->addResult([
                "comment_id" => $commentId ,
                "user_id" => ContextRepository::UserRepository()->GetUserAuthId() ,
                "like_or_dislike" => $newLikeOrDislike ,
            ]);
        }

        $count = $this->GetCountLikeComment($commentId);

        return [
            "like_or_dislike" => $newLikeOrDislike,
            "count" => $count
        ];
    }

    function GetQueryLikeOrDisclikCommentWithAuthUser($commentId)
    {
        return $this->model
            ->select(DB::raw("Sum(like_or_dislike) as like_or_dislike"))
            ->whereColumn("comment_id" , $commentId )
            ->where("user_id" , ContextRepository::UserRepository()->GetUserAuthId() );
    }


    public function GetQueryCountLikeComment($commentId){

        return $this->model
            ->select(DB::raw("Sum(like_or_dislike) as count_like"))
            ->whereColumn("comment_id" , $commentId  );
    }


    function GetCountLikeComment($commentId)
    {
        $count = 0;
        $result = $this->model->select(DB::raw("Sum(like_or_dislike) as count_like"))->where("comment_id" , $commentId )->first();
        if ($result["count_like"] != null){
            $count = $result["count_like"];
        }
        return $count;
    }


    //// ==========================================
    private function returnStatusLikeOrDislike($lastCommentLike , $lastLike ){
        $newLikeOrDislike = $lastLike;
        if (!empty($lastCommentLike) && $lastCommentLike->like_or_dislike == $lastLike){
            $newLikeOrDislike = 0;
        }
        return $newLikeOrDislike;
    }

    private function checkStatusLikeOrDislike($Like ){
        return in_array($Like , [-1 , +1]);
    }



}