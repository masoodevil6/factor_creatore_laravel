<?php

namespace App\Models\Seo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoPage extends Model
{
    use HasFactory;

    protected $fillable = [
        "title" , "spical"
    ];

    protected $casts = [
        "spical" => "boolean"
    ];


    ///==============================================
    /// Relations
    /// ==============================================

    //// hasMany
    public function metas(){
        return $this->hasMany(SeoMeta::class);
    }

}
