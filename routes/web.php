<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('get-post-with-cat', [AdminController::class, 'getPostWithCategory']);

Route::get('get-category', [AdminController::class, 'getCategory']);

Route::delete('/posts/{id}/delete', [AdminController::class, 'deletePost'])->name('posts.delete');

Route::get('soft-delete-posts', [AdminController::class, 'softDeleteds']);

Route::get('/categories/{id}/posts', [AdminController::class, 'getPosts'])->name('categories.posts');

