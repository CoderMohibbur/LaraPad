<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MediaController;

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









Route::group(['middleware' => ['role:Admin']], function () {
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