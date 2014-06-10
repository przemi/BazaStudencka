<?php

Route::get('/', function()
{
	return View::make('hello');
});

//wydarzenia
Route::get('/events', array(
    'as' => 'events.index',
    'uses' => 'EventsController@showIndex'
));

Route::get('/events/create', array(
    'as' => 'events.create',
    'uses' => 'EventsController@showCreate'
));

Route::post('/events/store', array(
    'as' => 'events.store',
    'uses' => 'EventsController@store'
));

Route::get('/events/edit/{id}', array(
    'as' => 'events.edit',
    'uses' => 'EventsController@showEdit'
));

Route::get('/events/view/{id}', array(
    'as' => 'events.view',
    'uses' => 'EventsController@showEvent'
));

//lokalizacje
Route::get('/localizations', array(
    'as' => 'localizations.index',
    'uses' => 'LocalizationsController@showIndex'
));

Route::get('/localizations/create', array(
    'as' => 'localizations.create',
    'uses' => 'LocalizationsController@showCreate'
));

Route::post('/localizations/store', array(
    'as' => 'localizations.store',
    'uses' => 'LocalizationsController@store'
));

Route::get('/localizations/edit/{id}', array(
    'as' => 'localizations.edit',
    'uses' => 'LocalizationsController@showEdit'
));

Route::get('/localizations/view/{id}', array(
    'as' => 'localizations.view',
    'uses' => 'LocalizationsController@showEvent'
));

