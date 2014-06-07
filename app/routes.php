<?php

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/events', array(
    'as' => 'events.index',
    'uses' => 'EventsController@showIndex'
));

Route::get('/events/add', array(
    'as' => 'events.add.index',
    'uses' => 'EventsController@showIndexAdd'
));

