<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{


    protected $guarded = [];


    public function condition()
    {
        return $this->hasMany('App\Models\Condition');

    }
}
