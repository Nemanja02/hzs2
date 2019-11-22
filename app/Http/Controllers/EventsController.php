<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\newEventRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EventsController extends Controller {
    public function showAll() {
        $data = DB::select('SELECT * FROM events');
        return view('events', ['events' => $data]);
    }

    public function showForm() {
        return view('addEvent');
    }

    public function addEvent(Request $req) {
        $name = $req->get('name');
        $type = $req->get('type');
        $price = $req->get('price');
        $desc = $req->get('desc');
        $start = strtotime($req->get('start'));
        $end = strtotime($req->get('end'));
        $loc = $req->get('loc');
        DB::table('events')->insert([
            'name' => $req->get('name'),
            'type' => $req->get('type'),
            'price' => $req->get('price'),
            'description' => $req->get('desc'),
            'starting_time' => strtotime($req->get('start')),
            'ending_time' => strtotime($req->get('end')),
            'city_id' => 1
        ]);
        return redirect()->route('event.new');
    }
}

?>