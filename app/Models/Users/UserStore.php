<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserStore extends Model
{
    use HasFactory;

    protected $fillable = [
        "name" , "phone", "address",
        "user_id"
    ];


    ///==============================================
    /// Relations
    /// ==============================================

    //// belongsTo
    public function user(){
        return $this->belongsTo(User::class);
    }
    
}

