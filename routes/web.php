<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\ReadingSettingController;
use App\Http\Controllers\Admin\WritingSettingController;
use App\Http\Controllers\Admin\DiscussionSettingController;


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



Route::group(['middleware' => ['role:Admin']], function () {

// Route::prefix('admin')->middleware(['auth', 'role:admin|Editor'])->group(function () {
//     Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
//     Route::resource('tags', \App\Http\Controllers\Admin\TagController::class);
// });


Route::group(['middleware' => ['role:admin']], function () {

    Route::get('/admin/dashboard', fn() => view('admin.dashboard'));
});


// routes/web.php

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('writing-settings', [WritingSettingController::class, 'index'])->name('writing-settings.index');
    Route::get('writing-settings/edit', [WritingSettingController::class, 'edit'])->name('writing-settings.edit');
    Route::post('writing-settings/update', [WritingSettingController::class, 'update'])->name('writing-settings.update');
});



Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('reading-settings', [ReadingSettingController::class, 'index'])->name('reading-settings.index');
    Route::get('reading-settings/edit', [ReadingSettingController::class, 'edit'])->name('reading-settings.edit');
    Route::post('reading-settings/update', [ReadingSettingController::class, 'update'])->name('reading-settings.update');
});



Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('discussion-settings', [DiscussionSettingController::class, 'index'])->name('discussion-settings.index');
    Route::get('discussion-settings/edit', [DiscussionSettingController::class, 'edit'])->name('discussion-settings.edit');
    Route::post('discussion-settings/update', [DiscussionSettingController::class, 'update'])->name('discussion-settings.update');
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

