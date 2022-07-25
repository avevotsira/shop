<?php

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\categorycontroller;
use App\Http\Controllers\CateController;
use App\Http\Controllers\ProductController;

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

Route::get("/", function () {
    return view("welcome");
});

Route::get("/test_category", function () {
    $post = Category::find(2);
    echo $post->name;
});

Route::get("/test_post", function () {
    $post = Post::find(1);
    echo $post->title;
});
Route::get("/test/{id}", function ($id) {
    $post = Category::find($id);
    echo $post->name;
});
Route::resource("/server", categorycontroller::class);

Route::resource("/category", CateController::class);

Route::get("/product", [ProductController::class, "index"])->name(
    "product.index"
);
Route::get("/product/create", [ProductController::class, "create"])->name(
    "product.create"
);
Route::post("/product", [ProductController::class, "store"])->name(
    "product.store"
);
Route::get("/product/{product}", [ProductController::class, "show"])->name(
    "product.show"
);
Route::delete("/product/{product}", [
    ProductController::class,
    "destroy",
])->name("product.destroy");
Route::get("/product/{product}/edit", [ProductController::class, "edit"])->name(
    "product.edit"
);
Route::put("/product/{product}", [ProductController::class, "update"])->name(
    "products.update"
);
