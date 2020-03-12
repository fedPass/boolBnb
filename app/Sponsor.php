<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $fillable = [
      'nome',
      'prezzo'
    ];

    public function apartments(){
      return $this->belongsToMany(Apartment::class);
    }
}
