<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voivodeship extends Model
{
    protected $fillable = ['name', 'unique_name'];

    public function cities(){
        return $this->hasMany(City::class);
    }
}
