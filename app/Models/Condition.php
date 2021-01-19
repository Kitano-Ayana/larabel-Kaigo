<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    //
    //protected $primaryKey= 'patient_id';

    public function patient(){
        return $this->belongsTo('App\Models\Patient');
    }

    protected $fillable =[
        'comment' 
    ];

}
