<?php

namespace Furbook\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use Furbook\Cat;

class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Cat::all();// select * from cats
        return view('cats/index')->with('cats', $cats);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cats.create') ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
        //C1
        $validator = $request->validate(
            [
            'name' => 'required|max:255',
            'date_of_birth' => 'required|date_format:"Y/m/d"',
            'breed_id' => 'required|numeric',
            ],
            [
            'required' => 'Cot :attribute la bat buoc.',
            'max' => 'Cot :attribute phai nho hon 255 ki tu.',
            'date_format' => 'Cot :attribute dinh dang phai la Y/m/d.',
            'numeric' => 'Cot :attribute phai la kieu so.',
            ]);
            //C2
        /*$validator = Validator::make($request->all(), 
            [
            'name' => 'required|max:255',
            'date_of_birth' => 'required|date_format:"Y/m/d"',
            'breed_id' => 'required|numeric',
            ],
            [
            'required' => 'Cot :attribute la bat buoc.',
            'max' => 'Cot :attribute phai nho hon 255 ki tu.',
            'date_format' => 'Cot :attribute dinh dang phai la Y/m/d.',
            'numeric' => 'Cot :attribute phai la kieu so.',
            ]
        );

        if ($validator->fails()) {
            return redirect()
                        ->route('cat.create')
                        ->withErrors($validator)
                        ->withInput();
        }*/
       $cat = Cat::create($request->all());

        return redirect()->route('cat.show',$cat->id)->with('cat', $cat)
        ->withSuccess('Cat has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cat $cat)
    {

        return view('cats.show')->with('cat', $cat);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cat $cat)
    {
        return view('cats.edit')->with('cat', $cat);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Cat $cat)
    {
         $cat->update($request->all());
         return redirect()->route('cat.show', $cat->id)
         ->withSuccess('Cat has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cat $cat)
    {
        $cat->delete();
         return redirect()->route('cat.index')
         ->withSuccess('Cat has been deleted.');
    }
}
