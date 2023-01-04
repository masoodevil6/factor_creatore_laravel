<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        "body" , "parent_id" , "music_id" , "user_id" , "seen" , "approved" , "status" , "name" , "email"
    ];




    ///==============================================
    /// properties
    /// ==============================================

    public static function approvedTitle() :Attribute{

        return Attribute::make(
            get: fn($value , $attr) => $attr["approved"] == 1 ? 'تایید شده' : 'تایید نشده'
        );
    }







    ///==============================================
    /// Relations
    /// ==============================================

    //// belongsTo
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function parent(){
        return $this->belongsTo($this , "parent_id");
    }



    //// hasMany
    public function answer(){
        return $this->hasOne($this , "parent_id");
    }

    public function answers(){
        return $this->hasMany($this , "parent_id");
    }

}
