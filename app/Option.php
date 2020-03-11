<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Apartment;

class Option extends Model
{
    protected $fillable = [
      'wifi',
      'posto_macchina',
      'piscina',
      'portineria',
      'sauna',
      'vista_mare',
    ];

    public function apartment(){
      return $this->belongsToMany(Apartment::class);
    }
}
