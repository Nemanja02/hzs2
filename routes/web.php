<?php

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/events', 'EventsController@showAll')->name('events');

Route::get('/event/{id}', 'EventsController@showEvent')->name('preview');

Route::get('/events/new', 'EventsController@showForm')->name('event.new');

Route::post('/events/add', 'EventsController@addEvent')->name('event.create');

Route::post('/events/search', 'EventsController@searchEvent')->name('event.create');