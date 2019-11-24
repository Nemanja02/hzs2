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
            'Izlozba' => 'palette',
            'Masterclass' => 'brush',
            'Music Festival' => 'speaker',
            'Zurka' => 'speaker'
        );
        return $icons[$type];
    }

    public static function getAllEvents($params) {
        $query = DB::table('events');
        $query->join('cities', 'events.city_id', '=', 'cities.city_id')->select('events.*', 'cities.*');
        if (isset($params['query']))
            $query->where('events.name', 'LIKE', '%'.$params['query'].'%')->orWhere('events.description', 'LIKE', '%'.$params['query'].'%');
        if (isset($params['maxprice']))
            $query->where('events.price', '<=', $params['maxprice']);
        if (isset($params['minprice']))
            $query->where('events.price', '>=', $params['minprice']);
        if (isset($params['type']))
            $query->where('type', '=', $params['type']);


        $data = $query->get();
        $data = Event::wrapEvent($data, $params);
        return $data;
    }

    public static function getEvent($id) {
        $data = DB::select("SELECT * FROM events LEFT JOIN (cities) ON (events.city_id = cities.city_id) WHERE id = $id");
        $data = Event::wrapEvent($data, null)[0];

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

    public static function deleteEvent($id) {
        DB::delete("DELETE FROM events WHERE id = $id");
    }

    public static function editEvent($req) {
        $query = DB::table('events')->where('id', '=', $req->get('id'))->update([
            'name' => $req->get('name'),
            'type' => $req->get('type'),
            'price' => $req->get('price'),
            'description' => $req->get('desc'),
            'starting_time' => strtotime($req->get('start')),
            'ending_time' => strtotime($req->get('end')),
            'ticket' => $req->get('ticket')
        ]);
        return DB::select('SELECT id FROM events WHERE id = id ORDER BY id DESC LIMIT 1')[0]->id;
    }

    public static function wrapEvent($data, $params) {
        $ip = $_SERVER['REMOTE_ADDR'];
        $ip = "212.200.181.208";
        $location = json_decode(file_get_contents('http://ip-api.com/json/'.$ip));
        for ($i = 0; $i < count($data); $i++) {
            $dist = round(Location::distance($data[$i]->lat, $data[$i]->long, $location->lat, $location->lon, "K"));
            $data[$i]->dist = $dist;
            $data[$i]->images = Event::getImages($data[$i]->id);
            $type = $data[$i]->type;
            $data[$i]->show = true;
            $data[$i]->icon = Event::getIcon($type);
            if (isset($params['mindist']) && $params['mindist'] > $dist)
                $data[$i]->show = false;
                if (isset($params['maxdist']) && $params['maxdist'] < $dist)
                $data[$i]->show = false;
        }
        return $data;
    }

    public static function getImages($id) {
        $images = [];
        foreach(scandir(public_path() . '/image') as $image) {
            if (strpos($image, $id . "-") === 0) array_push($images, $image);
        }
        return $images;
    } 
}
