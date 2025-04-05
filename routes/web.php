<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TagController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome2');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('posts', PostController::class);
Route::resource('categories', CategoryController::class);
Route::resource('tags', TagController::class);


// Route::prefix('admin')->middleware(['auth', 'role:admin|Editor'])->group(function () {
//     Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
//     Route::resource('tags', \App\Http\Controllers\Admin\TagController::class);
// });


Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin/dashboard', fn() => view('admin.dashboard'));
});
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/users/{user}/edit-role', [UserController::class, 'editRole'])->name('users.edit-role');
    Route::put('/users/{user}/update-role', [UserController::class, 'updateRole'])->name('users.update-role');
});
// Route::prefix('admin')->middleware(['auth', 'role:Admin'])->group(function () {
//     Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
// });
