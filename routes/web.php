<?php

use App\Http\Controllers\PostController;
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


Auth::routes();
// Allows you to navigate to /home, uses PostController class home which tells it which view to return, which would also be the home.blade.php file.
Route::get('/', [PostController::class, 'home'])->name('home');
Route::get('/post/{id}', [PostController::class, 'getPost'])->name('post.get');
Route::group(['middleware' => ['auth']], function() {
    Route::get('/edit/{id}', [PostController::class, 'editPost'])->name('post.edit');
    Route::get('/create', [PostController::class, 'createPost']);
    Route::post('update-data/{id}', [PostController::class, 'updatePost']);
    Route::post('/post/store', [PostController::class, 'storePost']);
    Route::delete("/post/destroy/{id}", [PostController::class, 'destroy']);
});

