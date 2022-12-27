<?php

namespace App\Models\Ticket;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        "title" , "status"
    ];



    ///==============================================
    /// Relations
    /// ==============================================

    //// hasMany
    public function tickets(){
        return $this->hasMany(Ticket::class );
    }
}
