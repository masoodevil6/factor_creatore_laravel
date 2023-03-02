<?php

namespace App\Models\Seo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoMeta extends Model
{
    use HasFactory;

    protected $fillable = [
        "title" , "description" ,
        "seo_page_id"
    ];



    ///==============================================
    /// Relations
    /// ==============================================

    //// belongsTo
    public function page(){
        return $this->belongsTo(SeoPage::class);
    }


    //// belongsToMany
    public function robots(){
        return $this->belongsToMany(SeoRobot::class );
    }


    //// hasMany
    public function keywords(){
        return $this->hasMany(SeoKeyword::class);
    }

}
