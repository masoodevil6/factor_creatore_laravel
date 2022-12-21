<?php

namespace App\Models\Forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormCategory extends Model
{
    use HasFactory;

    protected $fillable = ["title" , "status"];

    ///==============================================
    /// Relations
    /// ==============================================

    //// hasMany
    public function forms(){
        return $this->hasMany(Form::class);
    }
}
