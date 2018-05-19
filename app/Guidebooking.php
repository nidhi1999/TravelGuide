<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guidebooking extends Model
{
    //
    protected $fillable=['guide_id','tourist_id','start_date','ending_date','destination_id','status'];

    public function tourists()
    {
       return $this->belongsTo('App\Tourists','tourist_id','tourist_id');
    }

    public function guides()
    {
       return $this->belongsTo('App\Guide','guide_id','guide_id');
    }
    public function destinations()
    {
        return $this->belongsTo('App\Destinations','destination_id','id');
    }
}
