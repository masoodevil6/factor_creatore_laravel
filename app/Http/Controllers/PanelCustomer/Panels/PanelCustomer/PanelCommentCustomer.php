<?php
namespace App\Http\Controllers\PanelCustomer\Panels\PanelCustomer;

use App\Http\Controllers\PanelCustomer\Panels\InterfacePanelCustomer\IPanelCommentCustomer;
use App\Repositories\ContextRepository;

class PanelCommentCustomer extends BasePanelCustomer implements IPanelCommentCustomer {

    public function __construct()
    {
        $this->setTitleFa("نظرات");
        $this->setTitleEn("comments");
        $this->setIcon("fas fa-comments");
    }


    public function returnPanelView()
    {
        $titleFa = $this->getTitleFa();
        $titleEn = $this->getTitleEn();
        $comments = ContextRepository::CommentRepository()->GetListCommentsAuthUser();
        return view("customer-panels.panels.panel-comment.index" , compact("titleFa" , "titleEn" ,  "comments"))->render();
    }

    public function deleteUserComment($comment)
    {
        ContextRepository::CommentRepository()->DeleteSelectedCommentAuthUser($comment);
    }

    public function SendNewCommandUser($body)
    {
        ContextRepository::CommentRepository()->SendNewCommandUser($body);
    }

    public function likeOrDislikeCommand($commentId , $likeOrDislike)
    {
        return ContextRepository::CommentLikeRepository()->LikeOrDislikeCommentWithAuthUser($commentId , $likeOrDislike);
    }



}