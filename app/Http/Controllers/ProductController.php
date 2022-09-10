<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Session;
use Validator;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return view("product.index")->with("products", $product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view("product.create");
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|max:20|min:3",
            "description" => "required|max:20|min:3",
            "image" => "required",
            "price" => "required|max:50",
        ]);

        if ($validator->fails()) {
            return redirect("product/create")
                ->withInput()
                ->withErrors($validator);
        }

        // Create The product

        $image = $request->file("image");
        $upload = "img/";
        $filename = time() . $image->getClientOriginalName();
        $path = move_uploaded_file($image->getPathName(), $upload . $filename);

        $product = new product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->image = $filename;
        $product->price = $request->price;
        $product->save();

        Session::flash("post_create", "New Post is Created");

        return redirect("product/create");
    }
    public function edit($id)
    {
        $product = Product::find($id);
        return view("product.edit")->with("products", $product);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $validator = Validator::make($request->all(), [
            "name" => "required|max:20|min:3",
            "description" => "required|max:20|min:3",
        ]);
        if ($validator->fails()) {
            return redirect("product/" . $id . "/edit")
                ->withInput()
                ->withErrors($validator);
        }

        $image = $request->file("image");
        $upload = "img/";
        $filename = time() . $image->getClientOriginalName();
        $path = move_uploaded_file($image->getPathName(), $upload . $filename);

        $product->name = $request->Input("name");
        $product->description = $request->description;
        if ($filename) {
            $product->image = $filename;
        }
        $product->price = $request->price;
        $product->save();

        Session::flash("post_update", "Post is Updated");
        return redirect("product");
    }
    public function destroy($id)
    {
        $post = Product::find($id);

        $image_path = "img/" . $post->image;
        File::delete($image_path);

        $post->delete();

        Session::flash("post_delete", "Post is Delete");

        return redirect("product");
    }
}
// {
//     $validator = Validator::make($request->all(), [

//         'name' => 'required|max:20|min:3',
//         'description' => 'required|max:20|min:3',
//         'image' => 'mimes:jpg,jpeg,png,gif',
//         'price' => 'required|max:50|min:10',
//     ]);

//     if ($validator->fails()) {
//         return redirect('product/'.$id.'/edit')
//             ->withInput()
//             ->withErrors($validator);
//     }
//     $product = Post::find($id);
//     // Create The Post
//     if($request->file('image') != ""){
//         $image = $request->file('image');
//         $upload = 'img/';
//         $filename = time().$image->getClientOriginalName();
//         $path = move_uploaded_file($image->getPathName(), $upload. $filename);
//     }

//     $product->name = $request->Input('name');
//     $product->description = $request->Input('description');
//     if(isset($filename)){
//         $product->image = $filename;
//     }
//     $product->price = $request->Input('price');
//     $product->save();

//     Session::flash('post_update','Post is Updated');
//     return redirect('post/'.$post->id.'/edit');
// }
