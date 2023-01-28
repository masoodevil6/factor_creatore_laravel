<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppFile extends Model
{
    use HasFactory;

    protected $fillable = [
        "name", "address" , "format" , "size" , "version", "app_category_id"
    ];



    ///==============================================
    /// Relations
    /// ==============================================

    //// belongsTo
    public function appCategory(){
        return $this->belongsTo(AppCategory::class);
    }


    //// hasMany
    public function appFileLinks(){
        return $this->hasMany(AppFileLink::class);
    }
}
