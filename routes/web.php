<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/events', 'EventsController@showAll');

Route::get('/event/{id}', 'EventsController@showEvent');

Route::get('/events/new', 'EventsController@showForm')->name('event.new');

Route::post('/events/add', 'EventsController@addEvent')->name('event.create');