<?php

namespace App\Models\Ticket;

use App\Models\Users\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketFolder extends Model
{
    use HasFactory;
    private static $status= [
        [
            "id" => 0 ,
            "title" => "تیکت بسته"
        ],
        [
            "id" => 1 ,
            "title" => "تیکت باز"
        ]
    ];

    protected $fillable = [
        "ticket_category_id" , "user_id" , "status" , "title"
    ];



    ///==============================================
    /// methods
    /// =============================================

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


    public function ticketsNotSeen(){
        return $this->tickets()->where("seen" , 0)->where("admin_id" , null);
    }

    ///==============================================
    /// Relations
    /// ==============================================

    //// hasMany
    public function tickets(){
        return $this->hasMany(Ticket::class);
    }

    public function MainTicket(){
        return $this->hasOne(Ticket::class );
    }



    //// belongsTo
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function ticketCategory(){
        return $this->belongsTo(TicketCategory::class);
    }
}
