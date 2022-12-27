<?php

namespace App\Models\Ticket;

use App\Models\Users\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        "ticket_folder_id" , "admin_id" , "text"
    ];



    ///==============================================
    /// methods
    /// =============================================



    ///==============================================
    /// Relations
    /// ==============================================
    //// hasMany


    //// belongsTo
    public function ticketFolder(){
        return $this->belongsTo(TicketFolder::class);
    }

    public function adminAnswer(){
        return $this->belongsTo(User::class , "admin_id");
    }
}
