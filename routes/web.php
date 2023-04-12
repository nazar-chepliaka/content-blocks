<?php

//use App\Http\Controllers\ProfileController;
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

Route::group(['namespace' => 'App\Http\Controllers\PublicBackend'], function () {
    Route::get('/', 'HomepageController@index')->name('homepage');
    Route::get('/about', 'AboutController@index')->name('about');
    Route::get('/categories/{id}', 'CategoriesController@show')->name('categories.show');
    Route::get('/posts/{id}', 'PostsController@show')->name('posts.show');
});

Route::middleware(['auth', 'verified'])->name('admin.')->prefix('admin-panel')->namespace('App\Http\Controllers\AdminBackend')->group(function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::resource('pages', 'PagesController');
    
    Route::resource('categories', 'CategoriesController');
    Route::delete('/categories/{id}/image', 'CategoriesController@destroyImage')->name('categories.image.destroy');

    Route::resource('posts', 'PostsController');
    Route::delete('/posts/{id}/image', 'PostsController@destroyImage')->name('posts.image.destroy');
});

require __DIR__.'/auth.php';
