<?php

namespace App\Models\Factors;

use App\Models\Forms\Form;
use App\Models\Users\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateFactor extends Model
{
    use HasFactory;
    protected $fillable = [
        "description" ,
        "store_name", "store_phone", "store_address",
        "customer_name" , "customer_phone", "customer_address",
        "logo_name", "mohr_name",
        "form_id", "user_id",
        "type_logo", "type_mohr",
        "status"];

    protected $with=["products"];


    ///type_logo and type_mohr
    /// -1 => empty
    /// 0 => in panel client
    /// 1 => uploaded in template factor


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
        return $this->hasMany(TemplateFactorProduct::class);
    }
}
