<?php

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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();
Auth::routes(['verify' => true]);


Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::any('/home', 'HomeController@home');

Route::get('/profile', 'ProfileController@index')->name('profile.index');
Route::get('/profile/edit', 'ProfileController@edit')->name('profile.edit');
Route::post('/profile/update/personal', 'ProfileController@updatePersonal')->name('profile.update.personal');
Route::post('/profile/update/account', 'ProfileController@updateAccount')->name('profile.update.account');
Route::post('/profile/upload/profile-image', 'ProfileController@profileImage')->name('upload.profile.image');
Route::post('/profile/delete/profile-image', 'ProfileController@resetProfileImage')->name('reset.profile.image');
Route::post('/profile/upload/cover-image', 'ProfileController@coverImage')->name('upload.cover.image');
Route::post('/profile/delete/cover-image', 'ProfileController@resetCoverImage')->name('reset.cover.image');



















