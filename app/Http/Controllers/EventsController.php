<?php

namespace App\Http\Controllers;

use App\Event;
use App\Location;
use Illuminate\Http\Request;
use App\Http\Requests\newEventRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EventsController extends Controller {
    public function showAll() {
        $data = Event::getAllEvents();
        $ip = $_SERVER['REMOTE_ADDR'];
        $ip = "212.200.181.208";
        for ($i = 0; $i < count($data); $i++) {
            $location = json_decode(file_get_contents('http://ip-api.com/json/'.$ip));
            $dist = round(Location::distance($data[$i]->lat, $data[$i]->long, $location->lat, $location->lon, "K"));
            $data[$i]->dist = $dist;
            $data[$i]->images = Event::getImages($data[$i]->id);
        }

        return view('events', ['events' => $data]);
    }

    public function showForm() {
        return view('addEvent');
    }

    public function addEvent(Request $req) {
        $city_id = Location::addLocation($req->get('loc'));
        $id = Event::createEvent($req);
        ini_set("upload_max_filesize", '150M');
        ini_set("post_max_size", '150M');
        if($files=$req->file('images')){
            $i = 0;
            $time = time();
            foreach($files as $file){
                $name=$id . "-" . $i++ . "-" . $time . ".jpg";
                $file->move('image',$name);
            }
        }
        
        return redirect()->route('event.new');
    }
}

?>