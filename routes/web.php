<?php

Route::get('/', 'EventsController@index')->name('index');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/events', 'EventsController@showAll')->name('events');

Route::get('/event/{id}', 'EventsController@showEvent')->name('preview');

Route::get('/event/edit/{id}', 'EventsController@editEvent')->name('event.edit');

Route::post('/event/edit/apply', 'EventsController@applyEdit')->name('event.edit.apply');

Route::get('/event/delete/{id}', 'EventsController@deleteEvent')->name('event.delete');

Route::get('/events/new', 'EventsController@showForm')->name('event.new');

Route::post('/events/add', 'EventsController@addEvent')->name('event.create');

Route::post('/events/search', 'EventsController@searchEvents')->name('event.search');