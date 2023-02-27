<?php

namespace App\Models\Seo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoKeyword extends Model
{
    use HasFactory;

    protected $fillable = [
        "title" ,
        "seo_meta_id"
    ];


    ///==============================================
    /// Relations
    /// ==============================================

    //// belongsTo
    public function meta(){
        return $this->belongsTo(SeoMeta::class);
    }

}
