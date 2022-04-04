<?php
Route::get('login','LoginController@login')->name('dashboard.login');
Route::post('login','LoginController@dologin')->name('dashboard.dologin');
Route::get('/logout','LoginController@logout')->name('logout');
Route::get('/register','LoginController@register')->name('register');
Route::post('/register','LoginController@doregister')->name('doregister');

Route::middleware('check.auth')->get('dashboard','LoginController@dashboard')->name('dashboard.home');
