<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppFileLink extends Model
{
    use HasFactory;

    protected $fillable = [
        "name" , "image", "address" , "status" , "app_file_id"
    ];


    ///==============================================
    /// Relations
    /// ==============================================

    //// belongsTo
    public function appCategory(){
        return $this->belongsTo(AppCategory::class);
    }

    public function appFile(){
        return $this->belongsTo(AppFile::class);
    }

}
