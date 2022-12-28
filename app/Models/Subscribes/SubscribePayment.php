<?php

namespace App\Models\Subscribes;

use App\Models\Banks\Bank;
use App\Models\Users\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscribePayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'subscribe_id',
        'bank_id',
        'res_num',
        "ref_num",
        "amount",
        "phone",
        "email",
        "status",
        "admin_add",
        "time_set"
    ];

    private static $status= [
        [
            "id" => 0 ,
            "title" => "پرداخت نشده"
        ],
        [
            "id" => 1 ,
            "title" => "پرداخت شده"
        ]
    ];


    ///==============================================
    /// functions
    /// ==============================================

    public static function status() :Attribute{

        return Attribute::make(
            get: fn($attr , $value) => self::getStatus($value["status"])
        );
    }

    private static function getStatus($status){
        $resultExp="";
        foreach (self::$status AS $itemStatus){
            if ($status == $itemStatus["id"]){
                $resultExp = $itemStatus;
                break;
            }
        }
        return $resultExp;
    }




    ///==============================================
    /// relations
    /// ==============================================

    /// belongsTo
    public function subscribe(){
        return $this->belongsTo(Subscribe::class);
    }
    public function bank(){
        return $this->belongsTo(Bank::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }


    //// has many

}
