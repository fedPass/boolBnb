<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Options;
use App\Sponsor;
use App\Image;

class Apartment extends Model
{
  protected $fillable = [
    'titolo',
    'stanze',
    'posti_letto',
    'bagni',
    'dimensioni',
    'descrizione',
    'indirizzo',
    'paese',
    'lon',
    'lat',
    'user_id',
    'visibilita'
  ];

  // protected $guarded = [];


  public function user(){
    return $this->belongsTo(User::class);
  }

  public function options(){
    return $this->belongsToMany(Option::class);
  }

  public function sponsors(){
    return $this->belongsToMany(Sponsor::class)->withPivot('due_date')->withTimestamps();
  }

  public function images(){
    return $this->hasMany(Image::class);
  }
}
