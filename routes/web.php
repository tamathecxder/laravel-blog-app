<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Post;
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
    return view('home');
});


Route::get('/about', function() {
    return view('about', [
        'name' => 'John Doe',
        'email' => 'example@email.com',
        'img' => 'prog.jpg'
    ]);
});

// All posts page
Route::get('/posts', [PostController::class, 'index']);

// Single Post Page
Route::get('/posts/{post:slug}', [PostController::class, 'show']);


// All Categories
Route::get('/categories', function(Category $category) {
    return view('categories', [
        'categories' => $category->all(),
    ]);
});

// Specific Category
Route::get('/categories/{category:slug}', function(Category $category) {
    return view('category', [
        'category' => $category,
        'posts' => $category->post,
    ]);
});
