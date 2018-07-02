<?php

namespace Furbook\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Furbook\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = ['categories'=>[]];
        $categories = Category::all();
        foreach ($categories as $category) {
            //$categories[] = array('category')
            array_push($response['categories'], array('id'=>(int)$category->id, 'name'=>$category->name));
        }
        return response($response, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), 
            [
                'name' => 'required|string|max:255',
            ],
            [
                'required' => 'Cot :attribute la bat buoc.',
                'string' => 'Cot :attribute phai la kieu string.',
                'max' => 'Cot :attribute phai nho hon 255 ki tu.',
            ]
        );

        if ($validator->fails()) {
            return response([
                'error'=>$validator->errors()
            ], 400);
            }
        
        $categories = Category::create($request->all());
        $response = array('categories'=>array('id'=> (int)$categories->id, 'name'=>$categories->name));
        return response($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        $response = array('category'=>array('id'=>(int)$category->id, 'name'=>$category->name));
        return response($response, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
         $validator = Validator::make($request->all(), 
            [
                'name' => 'required|string|max:255',
            ],
            [
                'required' => 'Cot :attribute la bat buoc.',
                'string' => 'Cot :attribute phai la kieu string.',
                'max' => 'Cot :attribute phai nho hon 255 ki tu.',
            ]
        );

        if ($validator->fails()) {
            return response([
                'error'=>$validator->errors()
            ], 400);
            }
        
        $category->update($request->all());
        $response = array('category'=>array('id'=> (int)$category->id, 'name'=>$category->name));
        return response($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        if (!$category->delete()) {
            return response(null,500);
        }
        return response(null,204);
    }
}
