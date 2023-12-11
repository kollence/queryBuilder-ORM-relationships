<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\TagsController;
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

// Route::resource('/posts', PostsController::class);
Route::controller(PostsController::class)->group(function () {
    Route::get('posts', 'index')->name('posts.index');
    Route::get('posts/create', 'create')->name('posts.create');
    Route::post('posts', 'store')->name('posts.store');
    Route::get('posts/{post}', 'show')->name('posts.show');
    Route::get('posts/{post}/edit', 'edit')->name('posts.edit');
    Route::put('posts/{post}', 'update')->name('posts.update');
    Route::delete('posts/{post}', 'destroy')->name('posts.destroy');

    Route::get('removeAllFromSoftDeleted','removeAllFromSoftDeleted');
    Route::get('removeSingleFromSoftDeleted','removeSingleFromSoftDeleted')->name('posts.restore');
    Route::get('replicatePost','replicatePost')->name('posts.replicate');

    Route::post('posts/{post}/detach_tag', 'detachTag')->name('posts.detach_tag');
    Route::post('posts/{post}/attach_tag', 'attachTag')->name('posts.attach_tag');
    Route::post('posts/{post}/update_tag', 'updateExistingTag')->name('posts.update_tag');
    Route::post('posts/{post}/add_image', 'addImage')->name('posts.add_image');
});


Route::controller(UsersController::class)->group(function () {
    Route::get('users', 'index')->name('users.index');
    Route::post('users/{user}', 'storeContact')->name('users.storeContact');
    Route::get('users/{user}', 'show');
    Route::post('users', 'store');
    Route::put('users/{user}', 'update');
    Route::delete('users/{user}', 'destroy');
});

Route::controller(TagsController::class)->group(function () {
    Route::get('tags', 'index')->name('tags.index');
    Route::get('tags/create', 'create')->name('tags.create');
    Route::post('tags', 'store');
    Route::put('tags/{tag}', 'update');
    Route::delete('tags/{tag}', 'destroy');
});