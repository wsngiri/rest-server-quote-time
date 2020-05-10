<?php

Route::group(['middleware' => ['api']], function () {

    Route::post('auth/register', 'AuthController@signup');
    
});