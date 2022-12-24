<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Otp extends Model
{
    use HasFactory;


    protected $fillable = [
        'token', "otp_code" , "input_login" , "type" , "used" , "status" , "user_id",
    ];

    public $types = [
        [
            "type" => 0 ,
            "title" => "phone" ,
        ],
        [
            "type" => 1 ,
            "title" => "email" ,
        ]
    ];


    //// =======================================
    /// Relations
    /// ========================================
    public function user(){
        return $this->belongsTo(User::class);
    }

}
