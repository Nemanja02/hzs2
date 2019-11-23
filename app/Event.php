<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    private static function getIcon($type) {
        $icons = array(
            'Koncert' => 'music_note',
            'Film' => 'movie',
            'Predstava' => 'theaters',
            'Sajam' => 'business',
            'Izlozba' => 'pallete',
            'Masterclass' => 'brush',
            'Music Festival' => 'speaker',
            'Zurka' => 'speaker'
        );
        return $icons[$type];
    }

    public static function getAllEvents() {
        $data = DB::select('SELECT * FROM events LEFT JOIN (cities) ON (events.city_id = cities.city_id)');
        $ip = $_SERVER['REMOTE_ADDR'];
        $ip = "212.200.181.208";
        for ($i = 0; $i < count($data); $i++) {
            $location = json_decode(file_get_contents('http://ip-api.com/json/'.$ip));
            $dist = round(Location::distance($data[$i]->lat, $data[$i]->long, $location->lat, $location->lon, "K"));
            $data[$i]->dist = $dist;
            $data[$i]->images = Event::getImages($data[$i]->id);
            $type = $data[$i]->type;
            $data[$i]->icon = Event::getIcon($type);
        }
        return $data;
    }

    public static function searchEvents($query) {
        $data = DB::select("SELECT * FROM events LEFT JOIN (cities) ON (events.city_id = cities.city_id) WHERE name LIKE '%$query%' OR description LIKE '%$query%'");
        $ip = $_SERVER['REMOTE_ADDR'];
        $ip = "212.200.181.208";
        for ($i = 0; $i < count($data); $i++) {
            $location = json_decode(file_get_contents('http://ip-api.com/json/'.$ip));
            $dist = round(Location::distance($data[$i]->lat, $data[$i]->long, $location->lat, $location->lon, "K"));
            $data[$i]->dist = $dist;
            $data[$i]->images = Event::getImages($data[$i]->id);
            $type = $data[$i]->type;
            $data[$i]->icon = Event::getIcon($type);
        }
        return $data;
    }

    public static function getEvent($id) {
        $data = DB::select("SELECT * FROM events LEFT JOIN (cities) ON (events.city_id = cities.city_id) WHERE id = $id")[0];
        $ip = $_SERVER['REMOTE_ADDR'];
        $ip = "212.200.181.208";
        $location = json_decode(file_get_contents('http://ip-api.com/json/'.$ip));
        $dist = round(Location::distance($data->lat, $data->long, $location->lat, $location->lon, "K"));
        $data->dist = $dist;
        $data->images = Event::getImages($data->id);
        $type = $data->type;
        $data->icon = Event::getIcon($type);

        return $data;
    }

    public static function createEvent($req, $city_id) {
        DB::table('events')->insert([
            'name' => $req->get('name'),
            'type' => $req->get('type'),
            'price' => $req->get('price'),
            'description' => $req->get('desc'),
            'starting_time' => strtotime($req->get('start')),
            'ending_time' => strtotime($req->get('end')),
            'city_id' => $city_id,
            'ticket' => $req->get('ticket')
        ]);
        return DB::select('SELECT id FROM events WHERE id = id ORDER BY id DESC LIMIT 1')[0]->id;
    }

    public static function getImages($id) {
        $images = [];
        foreach(scandir(public_path() . '/image') as $image) {
            if (strpos($image, $id . "-") === 0) array_push($images, $image);
        }
        return $images;
    } 
}
