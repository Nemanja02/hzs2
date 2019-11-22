<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/events', 'EventsController@showAll');

Route::get('/events/new', 'EventsController@showForm')->name('event.new');

Route::post('/events/add', 'EventsController@addEvent')->name('event.create');