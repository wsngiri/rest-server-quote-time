<?php

Route::group(['middleware' => ['api']], function () {

    Route::post('auth/register', 'AuthController@signup');
    Route::post('auth/login', 'AuthController@login');

    Route::get('/quote', 'QuoteController@index');
    Route::get('/quote/{id}', 'QuoteController@show');

    Route::group(['middleware' => ['jwt.auth']], function () {

        Route::get('/profile', 'UserController@show');
        Route::post('/quote', 'QuoteController@create');

        //Quote
        Route::put('/quote/{id}', 'QuoteController@update');
        Route::delete('/quote/{id}', 'QuoteController@destroy');

        //Comment
        Route::post('/comment', 'CommentController@create');
    });
    
});