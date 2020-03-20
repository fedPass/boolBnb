<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
      'email_mittente',
      'messaggio',
      'apartment_id'
    ];

    public function apartment(){
      return $this->belongsTo(Apartment::class);
    }
}
