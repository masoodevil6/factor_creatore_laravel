<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentLike extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "comment_id" , "user_id" , "like_or_dislike"
    ];


    ///==============================================
    /// Relations
    /// ==============================================

    //// belongsTo
    public function comment(){
        return $this->belongsTo(Comment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }



    //// hasMany


}
