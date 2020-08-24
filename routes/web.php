<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'EditUserProfileController' )->name('profile.edit');
Route::put('/profile', 'UpdateUserProfileController')->name('profile.update');
Route::get('/gallery', 'ShowUserGalleryController')->name('gallery.show');
Route::put('/gallery', 'AddPictureToUserGalleryController')->name('gallery.add');
Route::get('users/{user}/gallery', 'ViewUserGalleryController')->name('gallery.view');
Route::get('/match', 'ShowMatchController')->name('match.view');
Route::get('/match/dislike/{user}', 'DislikeController')->name('match.dislike');
Route::get('/match/like/{user}', 'LikeController')->name('match.like');
Route::get('/binds', 'ViewBindsController')->name('binds.view');

