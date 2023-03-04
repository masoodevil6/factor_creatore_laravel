<?php

namespace App\Models\SiteMap;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SitemapUrl extends Model
{
    use HasFactory;
    protected $fillable = [
        "title" , "url", "priority", "changefreq" ,
        "sitemap_file_id"
    ];

    ///==============================================
    /// Relations
    /// ==============================================

    //// belongsTo
    public function sitmapFile(){
        return $this->belongsTo(SitemapFile::class , "sitemap_file_id");
    }

}
