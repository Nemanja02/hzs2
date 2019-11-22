<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Events {
    function getAllEvents(): array {
        return DB::select('SELECT * FROM events');
    }
}

?>