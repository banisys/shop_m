<?php
$base = 'base';
Route::get($base,'ControllerClass@posts')->name($base.'.posts');
Route::get($base.'/{id}','ControllerClass@post')->name($base.'.post');

Route::prefix('dashboard')->name('dashboard.')->middleware('check.auth')->group(function () use ($base) {

    Route::get('/'.$base.'/list','ControllerClass@list')->name($base.'.list');
    Route::get('/'.$base.'/create','ControllerClass@create')->name($base.'.create');
    Route::post('/'.$base.'/create','ControllerClass@store')->name($base.'.store');
    Route::get('/'.$base.'/edit/{id}','ControllerClass@edit')->name($base.'.edit');
    Route::post('/'.$base.'/edit/{id}','ControllerClass@update')->name($base.'.update');
    Route::get('/'.$base.'/delete/{id}','ControllerClass@delete')->name($base.'.delete');

});

