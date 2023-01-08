<?php

namespace App\Models\Factors;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateFactorProduct extends Model
{
    use HasFactory;
    protected $fillable = [ "name" , "num", "unit", "price", "off","template_factor_id" ];



    ///==============================================
    /// functions
    /// ==============================================

    public static function priceText() :Attribute{

        return Attribute::make(
            get: fn($attr , $value) => (isset($value["price"])) ? persianPriceFormat($value["price"]) : 0
        );
    }

    public static function offText() :Attribute{

        return Attribute::make(
            get: fn($attr , $value) => (isset($value["off"])) ? persianPriceFormat($value["off"]) : 0
        );
    }

    public static function totalOne() :Attribute{

        return Attribute::make(
            get: fn($attr , $value) => (isset($value["price"]) && isset($value["off"]) && isset($value["num"])) ? ($value["price"] - $value["off"]) : 0
        );
    }

    public static function totalOneText() :Attribute{

        return Attribute::make(
            get: fn($attr , $value) => (isset($value["price"]) && isset($value["off"]) && isset($value["num"])) ? persianPriceFormat(($value["price"] - $value["off"])) : 0
        );
    }


    public static function total() :Attribute{

        return Attribute::make(
            get: fn($attr , $value) => (isset($value["price"]) && isset($value["off"]) && isset($value["num"])) ? ($value["price"] - $value["off"])*$value["num"] : 0
        );
    }

    public static function totalText() :Attribute{

        return Attribute::make(
            get: fn($attr , $value) => (isset($value["price"]) && isset($value["off"]) && isset($value["num"])) ? persianPriceFormat(($value["price"] - $value["off"])*$value["num"]) : 0
        );
    }


    ///==============================================
    /// Relations
    /// ==============================================

    //// belongsTo
    public function factor(){
        return $this->belongsTo(TemplateFactor::class);
    }
}
