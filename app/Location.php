<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public static function addLocation($display_name, $lat, $lon) {
        DB::table('cities')->insert([
            'city_name' => $display_name,
            'lat' => $lat,
            'long' => $lon
        ]);
        return DB::select('SELECT city_id FROM cities WHERE city_id = city_id ORDER BY city_id DESC LIMIT 1')[0]->city_id;
    }

    public static function distance($lat1, $lon1, $lat2, $lon2, $unit) {
        if (($lat1 == $lat2) && ($lon1 == $lon2)) {
          return 0;
        }
        else {
          $theta = $lon1 - $lon2;
          $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
          $dist = acos($dist);
          $dist = rad2deg($dist);
          $miles = $dist * 60 * 1.1515;
          $unit = strtoupper($unit);
      
          return ($miles * 1.609344);
        }
      }
}