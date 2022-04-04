<?php
$route = 'spec';

Route::prefix('dashboard')->name('dashboard.')->middleware('check.auth')->group(function () use ($route) {

    Route::get('/'.$route.'/list','ControllerClass@list')->name($route.'.list');
    Route::get('/'.$route.'/create','ControllerClass@create')->name($route.'.create');
    Route::post('/'.$route.'/create','ControllerClass@store')->name($route.'.store');
    Route::get('/'.$route.'/edit/{id}','ControllerClass@edit')->name($route.'.edit');
    Route::post('/'.$route.'/edit/{id}','ControllerClass@update')->name($route.'.update');
    Route::get('/'.$route.'/delete/{id}','ControllerClass@delete')->name($route.'.delete');

    Route::get('/'.$route.'/categories/{id}','ControllerClass@categories')->name($route.'.categories');

});

