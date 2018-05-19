<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    protected $fillable=['tourist_id','guide_id','review'];

    public function tourists()
    {
        return $this->belongsTo('App\Tourists','tourist_id','tourist_id');
    }
}
