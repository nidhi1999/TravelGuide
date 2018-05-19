<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tourists extends Model
{
    protected $fillable = [
       'tourist_id', 'contactno', 'area', 'country','city','state'
    ];
    public function guidebooking()
    {
        return $this->hasMany('App\Guidebooking','tourist_id');
    }
    public function users()
    {
        return $this->belongsTo('App\User','tourist_id');
    }
}
