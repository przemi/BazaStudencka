<?php

Route::get('/', function()
{
	return View::make('home');
});

//autentykcja
Route::get('/login', ['as' => 'login', 'uses'=>'SessionsController@create']);
Route::get('/logout', ['as' => 'logout', 'uses'=>'SessionsController@destroy']);
Route::post('/login/store', ['as' => 'sessions.store', 'uses'=>'SessionsController@store']);

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

    Route::post('/events/save/{id}', array(
        'as' => 'events.save',
        'uses' => 'EventsController@save'
    ));

    Route::post('/events/delete/{id}', array(
        'as' => 'events.delete',
        'uses' => 'EventsController@delete'
    ));

    Route::post('/events/search/', array(
        'as' => 'events.search',
        'uses' => 'EventsController@search'
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
        'uses' => 'LocalizationsController@showLocalization'
    ));

    Route::post('/localizations/save/{id}', array(
        'as' => 'localizations.save',
        'uses' => 'LocalizationsController@save'
    ));

    Route::post('/localizations/delete/{id}', array(
        'as' => 'localizations.delete',
        'uses' => 'LocalizationsController@delete'
    ));

    Route::post('/localizations/search/', array(
        'as' => 'localizations.search',
        'uses' => 'LocalizationsController@search'
    ));

