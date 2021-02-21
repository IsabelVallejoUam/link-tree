<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ProfileController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/{email}', [ProfileController::class, 'profile']);

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/links', App\Http\Controllers\LinkController::class);
    Route::resource('/socialNetworks', App\Http\Controllers\SocialNetworkController::class);
    Route::get('/user', 'ProfileController@profile');
    //Route::get('edit',[ProfileController::class, 'edit']);

});