<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class experience extends Model
{
 
    protected $fillable=['booking_id','experience'];
     
    public function bookings()
    {
        return $this->belongsTo('App\Guidebooking','booking_id','booking_id');
    }
}
