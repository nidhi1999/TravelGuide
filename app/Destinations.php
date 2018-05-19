<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destinations extends Model
{   
    protected $fillable=['name','Address','category','open','close','description','status'];

    public function destination_images()
    {
        return $this->hasMany('App\destinationPhotos','destination_id','id');
    }
}
