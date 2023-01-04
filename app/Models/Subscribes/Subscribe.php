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
    /// functions
    /// ==============================================

    public static function totalPrice() :Attribute{

        return Attribute::make(
            get: fn($attr , $value) => self::getTotalPrice($value["real_price"] ,$value["off_price"])
        );
    }

    public static function getTotalPrice($realPrice , $offPrice){
        $resultExp = 0;
        if ($realPrice != null){
            $offPrice = (int) $offPrice;
            $resultExp = $realPrice - $offPrice;
        }
        return $resultExp;
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
