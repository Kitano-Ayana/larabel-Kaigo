<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    //

    public function patient(){
        return $this->belongsTo('App\Patient');
    }

    protected $fillable =[
        'comment' 
    ];

}
