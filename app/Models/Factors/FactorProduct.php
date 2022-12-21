<?php

namespace App\Models\Factors;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactorProduct extends Model
{
    use HasFactory;

    protected $fillable = [ "name" , "num", "unit", "price","factor_id" ];


    ///==============================================
    /// Relations
    /// ==============================================

    //// belongsTo
    public function factor(){
        return $this->belongsTo(Factor::class);
    }

}
