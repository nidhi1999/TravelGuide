<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    //

    protected $fillable=['guide_id','contactno', 'experience', 'about','fees','profile_img','name','destination'];
   // protected $guarded=['profie_pic'];
  public function guidebooking()
  {
      return $this->hasMany('App\Guidebooking','guide_id');
  }
  public function users()
  {
      return $this->belongsTo('App\User','guide_id');
  }
  public function reviews()
  {
      return $this->hasMany('App\Reviews','guide_id','guide_id');
  }
  public function ratings()
  {
      return $this->hasMany('App\ratings','guide_id','guide_id');
  }
}
