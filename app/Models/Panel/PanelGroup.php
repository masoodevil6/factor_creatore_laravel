<?php

namespace App\Models\Panel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PanelGroup extends Model
{
    use HasFactory;

    protected $fillable = ["title" , "title_en"];



    ///==============================================
    /// Relations
    /// ==============================================

    //// belongsTo



    //// hasMany
    public function panels(){
        return $this->hasMany(Panel::class);
    }

}
