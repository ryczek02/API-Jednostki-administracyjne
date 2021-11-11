<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    protected $fillable = ['name', 'voivodeship_id'];

    public function voivodeship(){
        return $this->belongsTo(Voivodeship::class);
    }

    public function cities(){
        return $this->hasMany(City::class);
    }
}
