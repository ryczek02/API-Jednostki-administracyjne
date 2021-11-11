<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name',
        'name_locative',
        'unique_name',
        'voivodeship_id',
        'county_id',
        'latitude'
    ];

    public function voivodeship(){
        return $this->belongsTo(Voivodeship::class);
    }

    public function county(){
        return $this->belongsTo(County::class);
    }
}
