<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public static function addLocation($loc) {
        $appid = "m3Lb7YaF9vxOQOF37nLZ";
        $appcode = "pWTRm-x6I_4ra-5ziQ1LWg";
        $get = json_decode(file_get_contents("https://geocoder.api.here.com/6.2/geocode.json?searchtext=$loc&app_id=$appid&app_code=$appcode&gen=8"));
        $lat = $get->Response->View[0]->Result[0]->Location->NavigationPosition[0]->Latitude;
        $long = $get->Response->View[0]->Result[0]->Location->NavigationPosition[0]->Longitude;
        $country = $get->Response->View[0]->Result[0]->Location->Address->Country;
        DB::table('cities')->insert([
            'city_name' => $loc,
            'lat' => $lat,
            'long' => $long,
            'country' => $country
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