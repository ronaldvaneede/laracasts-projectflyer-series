<?php

Route::group(['middleware' => ['web']], function () {
    Route::auth();

    Route::get('/', 'PagesController@home');

    Route::resource('flyers', 'FlyersController');
    Route::get('{zip}/{street}', 'FlyersController@show');
    Route::post('{zip}/{street}/photos',['as' => 'store_photo_path', 'uses' => 'FlyerPhotosController@store']);

    Route::delete('photos/{id}', 'FlyerPhotosController@destroy');
});
