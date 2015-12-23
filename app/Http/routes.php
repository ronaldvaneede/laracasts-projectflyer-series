<?php

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('pages.home');
    });

    Route::resource('flyers', 'FlyersController');
    Route::get('{zip}/{street}', 'FlyersController@show');
});
