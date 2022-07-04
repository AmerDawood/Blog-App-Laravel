<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\TagsController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'App\Http\Controllers\WelcomeController@index');


Auth::routes();


Route::group(['middleware'=>'auth'],function(){


    Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

    Route::resource('/categories', CategoriesController::class);
    
    Route::resource('/posts',PostsController::class);
    
    Route::get('/trashed-posts','App\Http\Controllers\PostsController@trashed')->name('trashed.index');
    
    
    Route::get('/trashed-posts/{id}','App\Http\Controllers\PostsController@restore')->name('trashed.restore');



    Route::resource('tags',TagsController::class);

    
});



Route::middleware(['auth'])->group(
    function(){
    Route::get('/users','App\Http\Controllers\UsersController@index')->name('users.index');
    Route::get('/users/create','App\Http\Controllers\UsersController@create')->name('users.create');
    Route::post('/users/{user}/make-admin','App\Http\Controllers\UsersController@makeAdmin')->name('users.make-admin');
    Route::post('/users/{user}/delete-admin','App\Http\Controllers\UsersController@deleteAdmin')->name('users.delete-admin');
    Route::get('/users/{user}/delete-admin','App\Http\Controllers\UsersController@deleteAdmin')->name('users.delete-admin');


}
);


Route::middleware(['auth'])->group(
    function(){
    Route::get('/dashboard','App\Http\Controllers\DashboardController@index')->name('dashboard');

    Route::get('/users/{user}/profile','App\Http\Controllers\UsersController@edit')->name('users.edit');
    Route::post('/users/{user}/profile','App\Http\Controllers\UsersController@update')->name('users.update');
}
);



/*

// middleware(['auth','admin'])-> 

Route:: group(['middleware'=>'auth','middleware'=>'admin'],function()
{
       Route::get('/users','App\Http\Controllers\UsersController@index')->name('users.index');
    Route::get('/users/create','App\Http\Controllers\UsersController@create')->name('users.create');
});
*/


