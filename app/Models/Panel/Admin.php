<?php

namespace App\Models\Panel;

use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    use HasFactory;
    use SoftDeletes;

    private static $panelPass = 75297530;

    protected $fillable = ["title" , "status"];





    ///==============================================
    /// functions
    /// ==============================================

    public static function getPanelPass(){
        return self::$panelPass;
    }





    ///==============================================
    /// Relations
    /// ==============================================

    //// belongsTo


    //// belongsToMany
    public function panels(){
        return $this->belongsToMany(Panel::class)->orderBy("id");
    }

    public function users(){
        return $this->belongsToMany(User::class)->withPivot("status");
    }


    //// hasMany
}
