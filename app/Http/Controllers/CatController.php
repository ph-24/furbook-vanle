<?php

namespace Furbook\Http\Controllers;
use Furbook\Http\Requests\CatRequest;
use Validator;
use Illuminate\Http\Request;
use Furbook\Cat;
use Auth;

class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {      
        $this->middleware('admin')->only('destroy');      
    }

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
     * @param  \Illuminate\Http\CatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
        //C1
        $validator = $request->validate(
            [
            'name' => 'required|max:255',
            'date_of_birth' => 'required|date_format:"Y-m-d"',
            'breed_id' => 'required|numeric',
            ],
            [
            'required' => 'Cot :attribute la bat buoc.',
            'max' => 'Cot :attribute phai nho hon 255 ki tu.',
            'date_format' => 'Cot :attribute dinh dang phai la Y-m-d.',
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
        $user_id = Auth::user()->id;
        $request->request->add(['user_id'=> $user_id]);
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
        if (!Auth::user()->canEdit($cat)) {
            return redirect()->route('cat.index')->withErrors('Permission denied');
        }
        return view('cats.edit')->with('cat', $cat);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\CatRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CatRequest $request,Cat $cat)
    {
        if (!Auth::user()->canEdit($cat)) {
            return redirect()->route('cat.index')->withErrors('Permission denied');
        }
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
