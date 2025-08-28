<?php

use Illuminate\Support\Facades\App;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;

use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AwardsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageFileController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\GalleryItemController;
use App\Http\Controllers\TeamSectionController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\PostRevisionController;
use App\Http\Controllers\Admin\GeneralController;
use App\Http\Controllers\PublicGalleryController;
use App\Http\Controllers\Admin\ReadingSettingController;
use App\Http\Controllers\Admin\WritingSettingController;
use App\Http\Controllers\Admin\DiscussionSettingController;



// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('new-home', function () {
    return view('pages.new-home');
});


Route::prefix('admin/pages')->middleware('auth')->group(function () {
    Route::get('{slug}/edit', [PageFileController::class, 'edit'])->name('admin.pages.edit');
    Route::post('{slug}/edit', [PageFileController::class, 'update'])->name('admin.pages.update');
    Route::get('/', [PageFileController::class, 'index'])->name('admin.pages.index');
});


Route::get('/', [TestimonialController::class, 'show'])->name('home');

Route::get('/services', function () {
    return view('pages.services');
});


Route::get('contact',[ContactController::class,'show'])->name('contact.show');
Route::post('/submit', [ContactController::class, 'submit'])
    ->middleware(['throttle:submit'])
    ->name('submit.submit');


Route::get('/awards', [AwardsController::class, 'show'])->name('awards.show');

Route::resource('/admin/awards', AwardsController::class)->except(['show']);

Route::resource('/admin/reviews', ReviewsController::class)->except(['show']);
Route::get('/reviews', [ReviewsController::class, 'show'])->name('reviews.show');

Route::resource('/admin/team', TeamSectionController::class)->except(['show']);

// Public Team page (এই পেজে pages.team রেন্ডার হবে)
Route::get('/our-team', [TeamSectionController::class, 'showTeamPage'])->name('team.page');


Route::resource('/admin/gallery-items', GalleryItemController::class)
    ->parameters(['gallery-items' => 'gallery_item']);


Route::get('/gallery-memory', [GalleryItemController::class, 'show'])
    ->name('gallery.memory.show');


// -------------------------------
// 🔓 Frontend Public Routes
// -------------------------------// ✅ POST: Store comment from blog post page
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');
    Route::post('/comments/{comment}/approve', [CommentController::class, 'approve'])->name('comments.approve');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});

Route::middleware('auth')->post('/posts/{post}/like', [PostLikeController::class, 'toggle'])->name('posts.like');

// -------------------------------
// 🔐 Admin Routes (grouped)
// -------------------------------
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    // 📝 Post CRUD
    Route::resource('posts', PostController::class);

    // 📁 Category CRUD
    Route::resource('categories', CategoryController::class)->except(['show']);

    // 🏷️ Tag CRUD
    Route::resource('tags', TagController::class)->except(['show']);

    // // 💬 Comment Management
    // Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');
    // Route::post('/comments/{comment}/approve', [CommentController::class, 'approve'])->name('comments.approve');
    // Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    // 📜 Post Revision Management
    Route::prefix('posts/{post}/revisions')->name('posts.revisions.')->group(function () {
        Route::get('/', [PostRevisionController::class, 'index'])->name('index');
        Route::get('/{revision}', [PostRevisionController::class, 'show'])->name('show');
        Route::post('/{revision}/restore', [PostRevisionController::class, 'restore'])->name('restore');
    });
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


Route::get('/team', function () {
    return view('pages.team');
});

Route::get('/about', function () {
    return view('pages.about');
});


// routes/web.php

Route::resource('testimonials', TestimonialController::class);

// Route for displaying testimonials in a slider
Route::get('/testimonials/slider', [TestimonialController::class, 'show'])->name('testimonials.slider');


// ✅ FRONTEND BLOG

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
// Blog category route
Route::get('/blog/category/{slug}', [CategoryController::class, 'show'])->name('category.show');




// ✅ ADMIN BLOG POSTS (CRUD)
// updated (remove blog. prefix):
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('posts', PostController::class)->except(['show']);
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
        Route::resource('sliders', \App\Http\Controllers\Admin\SliderController::class);
    });


    // routes/web.php

    Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
        Route::get('writing-settings', [WritingSettingController::class, 'index'])->name('writing-settings.index');
        Route::get('writing-settings/edit', [WritingSettingController::class, 'edit'])->name('writing-settings.edit');
        Route::post('writing-settings/update', [WritingSettingController::class, 'update'])->name('writing-settings.update');
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
        // routes/web.php
        Route::get('/admin/media/insert-modal', [MediaController::class, 'insertModal'])->name('media.insert-modal');
        Route::post('/media/sync', [MediaController::class, 'syncFromPublic'])->name('media.sync');
    });
});
// menus
Route::middleware(['auth', 'role:Admin|admin|Editor'])
    ->prefix('admin/menus')->name('admin.menus.')
    ->group(function () {
        Route::get('/', [MenuController::class, 'index'])->name('index');
        Route::post('/', [MenuController::class, 'store'])->name('store');
        Route::put('/{menu}', [MenuController::class, 'update'])->name('update');
        Route::delete('/{menu}', [MenuController::class, 'destroy'])->name('destroy');
        Route::post('/reorder', [MenuController::class, 'reorder'])->name('reorder');
        Route::post('/toggle/{menu}', [MenuController::class, 'toggle'])->name('toggle');
    });


Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:Admin|admin'])->group(function () {
    // Reading settings (others)
    Route::get('reading-settings', [ReadingSettingController::class, 'index'])->name('reading-settings.index');
    Route::get('reading-settings/edit', [ReadingSettingController::class, 'edit'])->name('reading-settings.edit');
    Route::post('reading-settings/update', [ReadingSettingController::class, 'update'])->name('reading-settings.update');

    // Logo — একটাই base path: /admin/logo
    Route::get('logo',    [ReadingSettingController::class, 'logo'])->name('reading-settings.logo');
    Route::post('logo',   [ReadingSettingController::class, 'updateLogo'])->name('reading-settings.update-logo');
    Route::delete('logo', [ReadingSettingController::class, 'destroyLogo'])->name('reading-settings.destroy-logo');
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
    Route::get('/', [GeneralController::class, 'general'])->name('settings.index');
    Route::post('/', [GeneralController::class, 'store'])->name('settings.store');
});
// Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
