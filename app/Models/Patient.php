<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{

    protected $fillable =[
           'id',
           'user_id',
           'patient_name',
           'email',
           'gender'
    ];
    public function condition()
    {
        return $this->hasOne('App\Condition');

    }
}
