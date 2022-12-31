<?php

namespace App\Models\Publics;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        "titleEn" , "titleFa" , "value"
    ];

}
