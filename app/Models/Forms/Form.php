<?php

namespace App\Models\Forms;

use App\Models\Factors\Factor;
use App\Models\Factors\TemplateFactor;
use App\Models\Subscribes\Subscribe;
use Illuminate\Database\Eloquent\Casts\Attribute;
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
    /// functions
    /// ==============================================

    public static function name() :Attribute{

        return Attribute::make(
            get: fn($attr , $value) => (isset($value["subscribe_id"]) && $value["subscribe_id"] == null) ? $value["name"]."[رایگان] " : $value["name"]
        );
    }


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
    public function templateFactors(){
        return $this->hasMany(TemplateFactor::class);
    }

    public function factors(){
        return $this->hasMany(Factor::class);
    }

}
