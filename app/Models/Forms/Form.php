<?php

namespace App\Models\Forms;

use App\Models\Factors\Factor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $casts =[
        "image" => "array"
    ];

    protected $fillable = ["name" , "class", "image", "status", "form_category_id"];


    ///==============================================
    /// Relations
    /// ==============================================

    //// belongsTo
    public function formCategory(){
        return $this->belongsTo(FormCategory::class);
    }

    //// hasMany
    public function factors(){
        return $this->hasMany(Factor::class);
    }
}
