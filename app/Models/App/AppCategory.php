<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        "name"
    ];


    ///==============================================
    /// Relations
    /// ==============================================

    //// hasMany
    public function appFiles(){
        return $this->hasMany(AppFile::class);
    }

    public function appFileLinks(){
        return $this->hasMany(AppFileLink::class);

    }





}
