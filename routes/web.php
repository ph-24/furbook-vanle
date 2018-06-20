<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  /* return view('cats/show')->with('number', 15);*/

    /*$number = 10;
    return view('cats/show',compact('number'));*/
    /*return view('cats/show',array('number'=>10));*/
    return view('cats');
});
Route::get('/', function () {
    return view('cats/index')->with('cats', '<h1>title<h1>');
});
Route::get('/', function () {
   return view('cats/show')->with('number', 15);

    
    
});