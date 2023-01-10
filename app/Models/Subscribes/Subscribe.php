<?php

namespace App\Models\Subscribes;

use App\Models\Forms\Form;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    use HasFactory;

    protected $fillable = [
        'title' , "real_price" , "off_price" , "duration" , "status" , "description" , "selected"
    ];



    ///==============================================
    /// properties
    /// ==============================================
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    ///==============================================
    /// functions
    /// ==============================================


    public static function realPriceText() :Attribute{

        return Attribute::make(
            get: fn($attr , $value) =>  (isset($value["real_price"])) ? persianPriceFormat($value["real_price"]) : 0
        );
    }

    public static function offPriceText() :Attribute{

        return Attribute::make(
            get: fn($attr , $value) =>  (isset($value["off_price"])) ? persianPriceFormat($value["off_price"]) : 0
        );
    }


    public static function totalPrice() :Attribute{

        return Attribute::make(
            get: fn($attr , $value) =>  (isset($value["real_price"]) && $value["off_price"]) ? ($value["real_price"] - $value["off_price"]) : 0
        );
    }

    public static function totalPriceText() :Attribute{

        return Attribute::make(
            get: fn($attr , $value) =>  (isset($value["real_price"]) && $value["off_price"]) ? persianPriceFormat($value["real_price"] - $value["off_price"]) : 0
        );
    }







    ///==============================================
    /// relations
    /// ==============================================

    //// belongsTo


    //// has many
    public function payments(){
        return $this->hasMany(SubscribePayment::class);
    }

    public function forms(){
        return $this->hasMany(Form::class);
    }
}
