<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\UsersController;
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

Route::resource('/posts', PostsController::class);
Route::get('removeAllFromSoftDeleted', [PostsController::class, 'removeAllFromSoftDeleted']);
Route::get('removeSingleFromSoftDeleted', [PostsController::class, 'removeSingleFromSoftDeleted'])->name('posts.restore');
Route::get('replicatePost', [PostsController::class, 'replicatePost'])->name('posts.replicate');

Route::controller(UsersController::class)->group(function () {
    Route::get('users', 'index')->name('users.index');
    Route::post('users/{user}', 'storeContact')->name('users.storeContact');
    Route::get('users/{user}', 'show');
    Route::post('users', 'store');
    Route::put('users/{user}', 'update');
    Route::delete('users/{user}', 'destroy');
});