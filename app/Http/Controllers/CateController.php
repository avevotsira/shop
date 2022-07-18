<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Session;
use Validator;

class CateController extends Controller
{
             public function index(){
        $categories = Category::all();
        return view('index')->with('categories', $categories);
            }
            public function create(){
                return view('create');
            }
            public function store(Request $request)
            {
                $request->validate([
                    'name' => 'required|max:255',
                    'description'=> 'required|max:255'
                ]);
                // Create The Category
                $category = new Category;
                $category->name = $request->name;
                $category->description = $request->description;
                Session::flash('category_create','New Category is Created');
                $category->save();
                
                return redirect('category/create');
            }
            public function destroy($id) {
                $categories = Category::find($id);
                $categories->delete();
                Session::flash('category_delete','Category is deleted.');
                return redirect('category');
            }
    
            public function edit($id)
            {
                $category = Category::find($id);
                return view('edit')->with('category', $category);
            }
        
            public function update(Request $request, $id)
            {
                        $validator = Validator::make($request->all(), [
                    'name' => 'required|max:20|min:3',
                    'description' => 'required|max:20|min:3',
                ]);
                if ($validator->fails()) {
                    return redirect('category/' . $id . '/edit')
                    ->withInput()
                    ->withErrors($validator);
                }
                // Create The Category
                $category = Category::find($id);
                $category->name = $request->Input('name');
                $category->description = $request->Input('description');
                $category->save();
                Session::flash('category_update','Category is updated.');
                return redirect('category/' . $id . '/edit');
            }
}
