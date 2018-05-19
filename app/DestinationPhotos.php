<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DestinationPhotos extends Model
{
    protected $fillable=['destination_id','image'];

    public function destinations()
    {
        return $this->belongsTo('App\Destinations');
    }
}
