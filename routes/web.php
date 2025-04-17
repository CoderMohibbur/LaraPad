<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\SettingController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', function () {
    return view('pages.home');
});

Route::get('/contact', function () {
    return view('pages.contact');
});

Route::get('/awards', function () {
    return view('pages.awards');
});

Route::get('/blog', function () {
    return view('pages.blog');
});

Route::get('/blogbacklink', function () {
    return view('pages.blogbacklink');
});

Route::get('/careers', function () {
    return view('pages.careers');
});

Route::get('/member-info', function () {
    return view('pages.memberinfo');
});


Route::get('/reviews', function () {
    return view('pages.reviews');
});

Route::get('/team', function () {
    return view('pages.team');
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
Route::resource('pages', PageController::class);




Route::group(['middleware' => ['role:Admin']], function () {

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


    Route::get('media', [MediaController::class, 'index'])->name('media.index');
    Route::post('media/upload', [MediaController::class, 'upload'])->name('media.upload');
    Route::put('media/{media}', [MediaController::class, 'update'])->name('media.update');
    Route::delete('media/bulk-delete', [MediaController::class, 'bulkDelete'])->name('media.bulk-delete');
    Route::post('media/sort', [MediaController::class, 'sort'])->name('media.sort');
    Route::get('media/insert-modal', [MediaController::class, 'insertModal'])->name('media.insert-modal');
    Route::get('media-library/popup', [MediaController::class, 'popup'])->name('media.library.popup');
});

});
// Route::prefix('admin')->middleware(['auth', 'role:Admin'])->group(function () {
//     Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
// });

// Route::prefix('admin')->middleware(['auth', 'role:Admin'])
//     Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
// });
Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
// Route::get('admin/settings', [SettingController::class, 'index'])->name('settings.index')->middleware('role:Admin');
// Route::post('admin/settings', [SettingController::class, 'store'])->name('settings.store')->middleware('role:Admin');
Route::prefix('admin/settings')->middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\GeneralController::class, 'general'])->name('settings.index');
    Route::post('/', [App\Http\Controllers\Admin\GeneralController::class, 'store'])->name('settings.store');
});
