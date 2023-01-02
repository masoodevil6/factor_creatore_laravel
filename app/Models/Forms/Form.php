<?php

namespace App\Models\Forms;

use App\Models\Factors\Factor;
use App\Models\Subscribes\Subscribe;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $casts =[
        "image" => "array"
    ];

    protected $fillable = ["name" , "class", "image", "status", "selected", "form_category_id" , "subscribe_id"];


    ///==============================================
    /// Relations
    /// ==============================================

    //// belongsTo
    public function formCategory(){
        return $this->belongsTo(FormCategory::class);
    }

    public function subscribe(){
        return $this->belongsTo(Subscribe::class);
    }


    //// hasMany
    public function factors(){
        return $this->hasMany(Factor::class);
    }

}
