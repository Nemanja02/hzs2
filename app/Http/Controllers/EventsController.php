<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\newEventRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EventsController extends Controller {
    public function showAll() {
        $data = DB::select('SELECT * FROM events');
        $places = DB::select('SELECT * FROM cities');

        return view('events', ['events' => $data]);
    }

    public function showForm() {
        return view('addEvent');
    }

    public function addEvent(Request $req) {
        $loc = $req->get('loc');
        $appid = "m3Lb7YaF9vxOQOF37nLZ";
        $appcode = "pWTRm-x6I_4ra-5ziQ1LWg";
        $get = json_decode(file_get_contents("https://geocoder.api.here.com/6.2/geocode.json?searchtext=$loc&app_id=$appid&app_code=$appcode&gen=8"));
        $lat = $get->Response->View[0]->Result[0]->Location->NavigationPosition[0]->Latitude;
        $long = $get->Response->View[0]->Result[0]->Location->NavigationPosition[0]->Longitude;
        $country = $get->Response->View[0]->Result[0]->Location->Address->Country;
        DB::table('cities')->insert([
            'name' => $loc,
            'lat' => $lat,
            'long' => $long,
            'country' => $country
        ]);
        $city_id = DB::select('SELECT id FROM cities WHERE id = id ORDER BY id DESC LIMIT 1')[0]->id;
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
        $id = DB::select('SELECT id FROM events WHERE id = id ORDER BY id DESC LIMIT 1')[0]->id;
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