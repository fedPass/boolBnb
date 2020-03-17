<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Options;

class Apartment extends Model
{
  protected $fillable = [
    'titolo',
    'stanze',
    'posti_letto',
    'bagni',
    'dimensioni',
    'descrizione',
    'img',
    'via',
    'civico',
    'cap',
    'cita',
    'provincia',
    'paese',
    'lon',
    'lat',
    'user_id'
  ];

  // protected $guarded = [];


  public function user(){
    return $this->belongsTo(User::class);
  }

  public function options(){
    return $this->belongsToMany(Option::class);
  }

}
