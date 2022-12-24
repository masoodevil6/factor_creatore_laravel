<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Admin\MainAdminController;
use App\Http\Requests\Admin\User\AnswerCommentRequest;
use App\Http\Requests\Admin\User\EditCommentRequest;
use App\Models\User\Comment;

class UserCommentAdminController extends MainAdminController
{

    function __construct()
    {
        parent::__construct(route("admin.user.comments.index") );
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

        $comments = Comment::simplePaginate(15);

        return view("admin.user.comment.index" , compact("nav" , "comments"));
    }


    public function adminAnswer(Comment $comment)
    {
        /// navigation page
        $nav = [
            "part"=> "بخش مدیریت کاربران",
            "navigation" =>[
                [
                    "route" => "admin.user.comments.index" ,
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

        $comment->update(["seen" => 1]);

        return view("admin.user.comment.answer" , compact("nav" , "comment"));
    }

    public function storeAnswer(AnswerCommentRequest $request , Comment $comment)
    {
        $data = $request->all();
        $inputs = [];


        $inputs["body"] = $data["body"];
        $inputs["parent_id"] = $comment->id;
        $inputs["music_id"] = $comment->music_id;
        $inputs["user_id"] = 1;
        $inputs["approved"] = 1;
        $inputs["status"] = 1;
        $inputs["seen"] = 1;


        if (empty($comment->answers)){
            Comment::create($inputs);
        }
        else{
            $comment->answers[0]->update($inputs);
        }

        return $this ->redirectIndex("پاسخ شما به نظر انتخاب شده، با موفقیت ثبت شد");
    }







    public function edit(Comment $comment)
    {
        /// navigation page
        $nav = [
            "part"=> "بخش مدیریت کاربران",
            "navigation" =>[
                [
                    "route" => "admin.user.comments.index" ,
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

        $comment->update(["seen" => 1]);

        return view("admin.user.comment.edit" , compact("nav" , "comment"));
    }

    public function update(EditCommentRequest $request, Comment $comment)
    {
        $data = $request->all();
        $inputs = [];
        $inputs["body"] = $data["body"];
        $inputs["approved"] = $data["approved"];
        $inputs["status"] = $data["approved"];

        $comment->update($inputs);
        return $this ->redirectIndex("نظر انتخاب شده با موفقیت ویرایش شد");
    }




    public function destroy(Comment $comment)
    {
        $comment->delete();
        return $this ->redirectIndex("نظر با موفقیت حذف شد");
    }






    public function status(Comment $comment){
        return $this->changeStatus($comment);
    }


    public function approved(Comment $comment){
        return $this->changeStatus($comment , "approved");
    }
}
