<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\City;
use App\Models\Voivodeship;
use App\Models\County;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $voivodeshipJson = file_get_contents('https://raw.githubusercontent.com/ryczek02/Polskie-jednostki-administracyjne/master/wojewodztwa.json');
        $voivodeshipJson = json_decode($voivodeshipJson, true);

        foreach($voivodeshipJson as $voivodeship){
            $uniqueName = Str::slug($voivodeship['name']);
            Voivodeship::create([
                'name' => mb_strtolower($voivodeship['name'], 'UTF-8'),
                'unique_name' => $uniqueName
            ]);
        }

        $countyJson = file_get_contents('https://raw.githubusercontent.com/ryczek02/Polskie-jednostki-administracyjne/master/powiaty.json');
        $countyJson = json_decode($countyJson, true);

        foreach($countyJson as $county){
            County::create([
                'name' => $county['name'],
                'voivodeship_id' => $county['voivodeship_id']
            ]);
        }

        County::create([
            'name'=> '',
            'voivodeship_id' => '16'
        ]);

        $cityJson = file_get_contents('https://raw.githubusercontent.com/ryczek02/Polskie-jednostki-administracyjne/master/miasta.json');
        $cityJson = json_decode($cityJson, true);

        foreach ($cityJson as $city){
            City::create([
                'name' => $city['name'],
                'unique_name' => $city['unique_name'],
                'name_locative' => $city['name_locative'],
                'voivodeship_id' => $city['voivodeship_id'],
                'county_id' => $city['county_id'],
                'latitude' => $city['latitude'],
                'longitude' => $city['longitude']
            ]);
        }
    }
}
