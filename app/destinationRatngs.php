<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class destinationRatngs extends Model
{
    public function destinations()
    {
       return $this->belongsTo('App\Destinations','destination_id','id');
    }
}
