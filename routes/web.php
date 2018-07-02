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
/* return view('cats/show')->with('number', 15);*/

    /*$number = 10;
    return view('cats/show',compact('number'));*/
    /*return view('cats/show',array('number'=>10));*/
use Illuminate\Support\Facades\Input;
//display home
Route::get('/', function () {
    return redirect('cat');

});





Route::group(['middleware'=>'auth'],function(){
  Route::resource('cat', 'CatController');
  //
  Route::get('cat/breeds/{name}', function ($name) {
  $breed = Furbook\Breed::with('cats')
    ->whereName($name)
    ->first();
  return view('cats.index')
    ->with('breed', $breed)
    ->with('cats', $breed->cats);
    
});
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
