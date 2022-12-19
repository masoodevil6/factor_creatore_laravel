<?php

namespace App\Models\Panel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panel extends Model
{
    use HasFactory;


    protected $fillable = ["icon" ,"name" ,"link" ,"panel_group_id"];



    ///==============================================
    /// Relations
    /// ==============================================

    //// belongsTo
    public function panelGroup(){
        return $this->belongsTo(PanelGroup::class);
    }


    //// belongsToMany
    public function admins(){
        return $this->belongsToMany(Admin::class);
    }

}
