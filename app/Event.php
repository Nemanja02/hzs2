<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    public static function getAllEvents() {
        return DB::select('SELECT * FROM events LEFT JOIN (cities) ON (events.city_id = cities.city_id)');
    }

    public static function getEvent($id) {
        return DB::select("SELECT * FROM events LEFT JOIN (cities) ON (events.city_id = cities.city_id AND events.id = $id)");
    }

    public static function createEvent($req) {
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
