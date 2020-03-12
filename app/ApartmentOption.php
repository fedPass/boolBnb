<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApartmentOption extends Model
{
  public function apartment(){
    return $this->belongsTo(Apartment::class);
  }
  public function options(){
    return $this->belongsTo(Options::class);
  }
}
