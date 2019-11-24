<?php

namespace App\Http\Controllers;

use App\Event;
use App\Location;
use Illuminate\Http\Request;
use App\Http\Requests\newEventRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EventsController extends Controller {

    public function showEvent($id) {
        return view('preview', ['data' => Event::getEvent($id)]);
    }

    public function editEvent($id) {
        return view('edit', ['data' => Event::getEvent($id)]);
    }

    public function showAll(Request $req) {
        $data = $req->query();
        return view('events', ['events' => Event::getAllEvents($data)]);
    }

    public function showForm() {
        return view('addEvent');
    }

    public function searchResult() {
        return view("results");
    }

    public function searchEvents(Request $req) {
        return redirect()->route('results')->with(['data' => Event::searchEvents($req->get('search'))]);
    }

    public function addEvent(Request $req) {
        $city_id = Location::addLocation($req->get('loc_name'), $req->get('lat'), $req->get('lon'));
        $id = Event::createEvent($req, $city_id);
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

    public function applyEdit(Request $req) {
        if ($req->get('lat') !== null && $req->get('lon') !== null)
            $city_id = Location::addLocation($req->get('loc_name'), $req->get('lat'), $req->get('lon'));
        $id = Event::editEvent($req);

        return redirect()->route('event.new');
    }
}

?>