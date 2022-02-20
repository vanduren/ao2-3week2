<?php

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/products/{product}', function (Product $product) {
    // return view('product', ['product' => $product]);
    return $product;
    // and $product->category
    // and $product->category->name etc.s
});

// route model binding
// endpoint wilcard name and variable name must be the same

Route::get('categories/{category}', function (Category $category) {
    // return $category;
    // and $category->products
    return $category->products;
});
require __DIR__.'/auth.php';
