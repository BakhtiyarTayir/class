<?php

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



Auth::routes();

Route::group(['namespace'=> 'Main'], function(){
    Route::get('/', [App\Http\Controllers\Main\IndexController::class, '__invoke']);

});

Route::group(['namespace'=> 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {
    Route::get('/', [App\Http\Controllers\Admin\IndexController::class, '__invoke'])->name('admin.index');
    Route::group(['namespace' => 'Post', 'prefix'=>'posts'], function(){
        Route::get('/', [App\Http\Controllers\Admin\Post\IndexController::class, '__invoke'])->name('admin.post.index');
    });

    Route::group(['namespace' => 'Ads', 'prefix'=>'ads'], function() {
        Route::get('/', [App\Http\Controllers\Admin\Advertisement\IndexController::class, '__invoke'])->name('admin.ads.index');
        Route::get('/create', [App\Http\Controllers\Admin\Advertisement\CreateController::class, '__invoke'])->name('admin.ads.create');
        Route::post('/', [App\Http\Controllers\Admin\Advertisement\StoreController::class, '__invoke'])->name('admin.ads.store');
        Route::get('/{post}', [App\Http\Controllers\Admin\Advertisement\ShowController::class, '__invoke'])->name('admin.ads.show');
        Route::get('/{post}/edit', [App\Http\Controllers\Admin\Advertisement\EditController::class, '__invoke'])->name('admin.ads.edit');
        Route::patch('/{post}', [App\Http\Controllers\Admin\Advertisement\UpdateController::class, '__invoke'])->name('admin.ads.update');
        Route::delete('/{post}', [App\Http\Controllers\Admin\Advertisement\DeleteController::class, '__invoke'])->name('admin.ads.delete');
    });

    Route::group(['namespace' => 'Post', 'prefix'=>'posts'], function() {
        Route::get('/', [App\Http\Controllers\Admin\Post\IndexController::class, '__invoke'])->name('admin.post.index');
        Route::get('/create', [App\Http\Controllers\Admin\Post\CreateController::class, '__invoke'])->name('admin.post.create');
        Route::post('/', [App\Http\Controllers\Admin\Post\StoreController::class, '__invoke'])->name('admin.post.store');
        Route::get('/{post}', [App\Http\Controllers\Admin\Post\ShowController::class, '__invoke'])->name('admin.post.show');
        Route::get('/{post}/edit', [App\Http\Controllers\Admin\Post\EditController::class, '__invoke'])->name('admin.post.edit');
        Route::patch('/{post}', [App\Http\Controllers\Admin\Post\UpdateController::class, '__invoke'])->name('admin.post.update');
        Route::delete('/{post}', [App\Http\Controllers\Admin\Post\DeleteController::class, '__invoke'])->name('admin.post.delete');
    });


    Route::group(['namespace' => 'Category', 'prefix'=>'categories'], function() {
        Route::get('/', [App\Http\Controllers\Admin\Category\IndexController::class, '__invoke'])->name('admin.category.index');
        Route::get('/create', [App\Http\Controllers\Admin\Category\CreateController::class, '__invoke'])->name('admin.category.create');
        Route::post('/', [App\Http\Controllers\Admin\Category\StoreController::class, '__invoke'])->name('admin.category.store');
        Route::get('/{category}', [App\Http\Controllers\Admin\Category\ShowController::class, '__invoke'])->name('admin.category.show');
        Route::get('/{category}/edit', [App\Http\Controllers\Admin\Category\EditController::class, '__invoke'])->name('admin.category.edit');
        Route::patch('/{category}', [App\Http\Controllers\Admin\Category\UpdateController::class, '__invoke'])->name('admin.category.update');
        Route::delete('/{category}', [App\Http\Controllers\Admin\Category\DeleteController::class, '__invoke'])->name('admin.category.delete');
    });

    Route::group(['namespace' => 'Tag', 'prefix'=>'tags'], function() {
        Route::get('/', [App\Http\Controllers\Admin\Tag\IndexController::class, '__invoke'])->name('admin.tag.index');
        Route::get('/create', [App\Http\Controllers\Admin\Tag\CreateController::class, '__invoke'])->name('admin.tag.create');
        Route::post('/', [App\Http\Controllers\Admin\Tag\StoreController::class, '__invoke'])->name('admin.tag.store');
        Route::get('/{tag}', [App\Http\Controllers\Admin\Tag\ShowController::class, '__invoke'])->name('admin.tag.show');
        Route::get('/{tag}/edit', [App\Http\Controllers\Admin\Tag\EditController::class, '__invoke'])->name('admin.tag.edit');
        Route::patch('/{tag}', [App\Http\Controllers\Admin\Tag\UpdateController::class, '__invoke'])->name('admin.tag.update');
        Route::delete('/{tag}', [App\Http\Controllers\Admin\Tag\DeleteController::class, '__invoke'])->name('admin.tag.delete');
    });

    Route::group(['namespace' => 'User', 'prefix'=>'users'], function() {
        Route::get('/', [App\Http\Controllers\Admin\User\IndexController::class, '__invoke'])->name('admin.user.index');
        Route::get('/create', [App\Http\Controllers\Admin\User\CreateController::class, '__invoke'])->name('admin.user.create');
        Route::post('/', [App\Http\Controllers\Admin\User\StoreController::class, '__invoke'])->name('admin.user.store');
        Route::get('/{user}', [App\Http\Controllers\Admin\User\ShowController::class, '__invoke'])->name('admin.user.show');
        Route::get('/{user}/edit', [App\Http\Controllers\Admin\User\EditController::class, '__invoke'])->name('admin.user.edit');
        Route::patch('/{user}', [App\Http\Controllers\Admin\User\UpdateController::class, '__invoke'])->name('admin.user.update');
        Route::delete('/{user}', [App\Http\Controllers\Admin\User\DeleteController::class, '__invoke'])->name('admin.user.delete');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
