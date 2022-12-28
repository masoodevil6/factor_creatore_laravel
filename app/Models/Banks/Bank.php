<?php

namespace App\Models\Banks;

use App\Models\Subscribes\SubscribePayment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', "status"
    ];



    ///==============================================
    /// relations
    /// ==============================================

    /// belongsTo


    //// hasMany
    public function SubscribePayments(){
        return $this->hasMany(SubscribePayment::class);
    }
}
