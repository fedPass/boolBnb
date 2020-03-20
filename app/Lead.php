<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
      'nome',
      'email_mittente',
      'messaggio',
      'oggetto',
      'apartment_id'
    ];

    public function apartment(){
      return $this->belongsTo(Apartment::class);
    }
}
