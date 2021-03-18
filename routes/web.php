<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard','Admin\ListingController@index')->name('admin.dashboard');

Route::get('/dashboard/listings/create','Admin\ListingController@create')->name('listing.create');

Route::post('/dashboard/listings','Admin\ListingController@store')->name('listing.store');

Route::get('/dashboard/listings/{listing}','Admin\ListingController@show')->name('listing.show');

Route::get('/dashboard/listings/{listing}/edit','Admin\ListingController@edit')->name('listing.edit');

Route::patch('/dashboard/listings/{listing}','Admin\ListingController@update')->name('listing.update');

Route::delete('/dashboard/listing/{listing}','Admin\ListingController@destroy')->name('listing.destroy');





Route::get('/home', 'HomeController@index')->name('user.home');
