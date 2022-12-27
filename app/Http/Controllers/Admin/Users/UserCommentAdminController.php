<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Admin\MainAdminController;
use App\Http\Requests\Admin\User\AnswerCommentRequest;
use App\Http\Requests\Admin\User\EditCommentRequest;
use App\Models\Users\Comment;
use App\Repositories\ContextRepository;

class UserCommentAdminController extends MainAdminController
{

    function __construct()
    {
        parent::__construct(route("admin.users.comment.index") );
    }


    public function index()
    {
        $nav = [
            "part"=> "بخش مدیریت کاربران",
            "navigation" =>[
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "لیست نظرات "
                ]
            ]
        ];

        $comments = ContextRepository::CommentRepository()->getPaginateResult();

        return view("admin.user.comment.index" , compact("nav" , "comments"));
    }



    public function adminAnswer(Comment $comment)
    {
        /// navigation page
        $nav = [
            "part"=> "بخش مدیریت کاربران",
            "navigation" =>[
                [
                    "route" => "admin.users.comment.index" ,
                    "current" => 0,
                    "title" => "لیست نظرات"
                ],
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "پاسخ به نظر"
                ]
            ]
        ];

        ContextRepository::CommentRepository()->updateResult($comment , ["seen" => 1]);

        return view("admin.user.comment.answer" , compact("nav" , "comment"));
    }

    public function storeAnswer(AnswerCommentRequest $request , Comment $comment)
    {
        $data = $request->all();

        $data = [
            "body" => $data["body"] ,
            "parent_id" => $comment->id ,
            "user_id" => 1 ,
            "approved" => 1 ,
            "status" => 1 ,
            "seen" => 1 ,
        ];

        ContextRepository::CommentRepository()->AdminAnswerCommentUser($comment , $data);

        return $this ->redirectIndex("پاسخ شما به نظر انتخاب شده، با موفقیت ثبت شد");
    }







    public function edit(Comment $comment)
    {
        /// navigation page
        $nav = [
            "part"=> "بخش مدیریت کاربران",
            "navigation" =>[
                [
                    "route" => "admin.users.comment.index" ,
                    "current" => 0,
                    "title" => "لیست نظرات"
                ],
                [
                    "route" => "" ,
                    "current" => 1,
                    "title" => "ویرایش نظر"
                ]
            ]
        ];

        ContextRepository::CommentRepository()->updateResult($comment , ["seen" => 1]);

        return view("admin.user.comment.edit" , compact("nav" , "comment"));
    }

    public function update(EditCommentRequest $request, Comment $comment)
    {
        $data = $request->all();

        $data = [
            "body" => $data["body"] ,
            "approved" => $data["approved"] ,
            "status" => $data["status"]
        ];

        ContextRepository::CommentRepository()->updateResult($comment , $data);

        return $this ->redirectIndex("نظر انتخاب شده با موفقیت ویرایش شد");
    }




    public function destroy(Comment $comment)
    {
        ContextRepository::CommentRepository()->deleteResult($comment);
        return $this ->redirectIndex("نظر با موفقیت حذف شد");
    }






    public function status(Comment $comment){
        $result = ContextRepository::CommentRepository()->changeStatusResult($comment);
        if ($result["status"]){
            return $result["exp"];
        }
    }


    public function approved(Comment $comment){
        $result = ContextRepository::CommentRepository()->changeStatusResult($comment , "approved");
        if ($result["status"]){
            return $result["exp"];
        }
    }
}
