<?php

namespace App\Models\Factors;

use App\Models\Forms\Form;
use App\Models\Users\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factor extends Model
{
    use HasFactory;

    protected $fillable = [
        "res_num" , "description" ,  "size",
        "store_name", "store_phone", "store_address",
        "customer_name" , "customer_phone", "customer_address",
        "file_name", "logo_name", "mohr_name",
        "form_id", "user_id",
        "status"];

    protected $with=["products"];



    ///==============================================
    /// Relations
    /// ==============================================

    //// belongsTo
    public function form(){
        return $this->belongsTo(Form::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }



    //// hasMany
    public function products(){
        return $this->hasMany(FactorProduct::class);
    }
}
