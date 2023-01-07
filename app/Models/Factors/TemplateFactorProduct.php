<?php

namespace App\Models\Factors;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateFactorProduct extends Model
{
    use HasFactory;
    protected $fillable = [ "name" , "num", "unit", "price","template_factor_id" ];


    ///==============================================
    /// Relations
    /// ==============================================

    //// belongsTo
    public function factor(){
        return $this->belongsTo(TemplateFactor::class);
    }
}
