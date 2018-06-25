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
    return redirect('cats');

});
//list cat
Route::get('cats', function () {
  $cats = Furbook\Cat::all();// select * from cats
  return view('cats.index')->with('cats', $cats);
});
//display list cat of breed name
Route::get('cats/breeds/{name}', function ($name) {
	$breed = Furbook\Breed::with('cats')
		->whereName($name)
		->first();
	return view('cats.index')
		->with('breed', $breed)
		->with('cats', $breed->cats);
   //echo $name;   
});
//display info cat

Route::get('/cats/{cat}', function (Furbook\Cat $cat) {
   
   //$cat = Furbook\Cat::find($id)->first();
   //dd($cat);
   return view('cats.show')->with('cat', $cat);
   //echo sprintf('cat #'.$id);   
})->where('cat','[0-9]+');
//create cat
Route::get('/cats/create', function () {
  // echo 'trang tao moi cat';  
  return view('cats.create') ;
});
Route::post('/cats', function () {
  //dd(Input::all());
   $cat = Furbook\Cat::create(Input::all());
   return redirect('cats/'.$cat->id)->with('cat', $cat)
      ->withSuccess('Cat has been created.');
   //echo sprintf('cat #'.$id);   
});


//update cat
Route::get('/cats/{cat}/edit', function(Furbook\Cat $cat) {

   //$cat = Furbook\Cat::find($id)->first();
   //dd($cat);
   return view('cats.edit')->with('cat', $cat);
   //echo sprintf('Edit Cat '.$id);   
});
Route::put('/cats/{cat}', function(Furbook\Cat $cat) {
   //$cat = Furbook\Cat::find($id)->first();
   $cat->update(Input::all());
   return redirect('cats/'.$cat->id)
      ->withSuccess('Cat has been updated.');
   //echo 'du lieu update da duoc gui len';   
});
//delete cat

Route::delete('/cats/{cat}', function (Furbook\Cat $cat) {
   //$id = Input::post($id);
   //$cat = Furbook\Cat::find($id)->first();
   //dd($cat);
   $cat->delete();
   return redirect('cats')->withSuccess('Cat has been deleted.');
   //echo sprintf('delete cat #'.$id);   
});
Route::get('/cats/{id}/delete', function ($id) {
  $cat = Furbook\Cat::find($id)->first();
  $cat->delete();
  return redirect('cats')->withSuccess('delete cat success');
   //echo sprintf('delete cat #'.$id);   
});

