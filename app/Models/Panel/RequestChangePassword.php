<?php

namespace App\Models\Panel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestChangePassword extends Model
{
    use HasFactory;

    protected $fillable=["user_email" , "user_password" , "token" , "active"];
}
