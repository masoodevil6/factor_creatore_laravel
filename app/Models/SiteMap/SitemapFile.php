<?php

namespace App\Models\SiteMap;

use App\Models\Seo\SeoPage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SitemapFile extends Model
{
    use HasFactory;

    protected $fillable = [
        "title_fa" , "title_en"
    ];

    ///==============================================
    /// Relations
    /// ==============================================

    //// hasMany
    public function sitmapUrls(){
        return $this->hasMany(SitemapUrl::class);
    }
}
