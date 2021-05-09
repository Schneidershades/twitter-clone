<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/timeline', 'Api\Timeline\TimelineController@index');

Route::get('/home', 'HomeController@index')->name('home');
