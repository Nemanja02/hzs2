<?php

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/events', 'EventsController@showAll')->name('events');

Route::get('/results', 'EventsController@searchResult')->name('results');

Route::get('/event/{id}', 'EventsController@showEvent')->name('preview');

Route::get('/event/edit/{id}', 'EventsController@editEvent')->name('event.edit');

Route::get('/events/new', 'EventsController@showForm')->name('event.new');

Route::post('/events/add', 'EventsController@addEvent')->name('event.create');

Route::post('/events/search', 'EventsController@searchEvents')->name('event.search');