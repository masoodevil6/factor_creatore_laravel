<?php

namespace App\Models\Seo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoRobot extends Model
{
    use HasFactory;

    protected $fillable = [
        "title" , "description"
    ];


    ///==============================================
    /// Relations
    /// ==============================================

    //// belongsToMany
    public function metas(){
        return $this->belongsToMany(SeoMeta::class);
    }



}
