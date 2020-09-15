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



// Route::get('login', function () {
//     return view('/Auth/login');
// });

// Auth Google
Route::get('auth/google', 'AuthController@redirectToGoogle');
Route::get('auth/google/callback', 'AuthController@handleGoogleCallback');

// Auth Manual
Auth::routes(['verify' => true]);

// TPS
Route::post('profile', 'UserController@update_avatar')->middleware('auth');
Route::post('/books/{id}', 'UserController@book')->middleware('auth');


// Pages
Route::get('/', 'HomeController@index')->name('home');
Route::get('/profile', 'PagesController@profile')->middleware('auth');
Route::get('/restoran/{id}','PagesController@restoran');
Route::get('/booking','PagesController@booking')->middleware('auth');


// Ajax
Route::post('/searchresto', 'AjaxController@search')->name('searchresto');
Route::post('/feedback','AjaxController@feedback')->middleware('auth');
Route::get('/restofeedback/{id}','AjaxController@fetchFeedback');
Route::post('/addbook','AjaxController@addBooking')->middleware('auth');
Route::get('/unbook/{id}','AjaxController@deleteBooking')->middleware('auth');
Route::get('/feedbackresto/{id}','AjaxController@fetchFeedback');
Route::post('/loadmore/load_data', 'AjaxController@loadMoreData')->name('loadmore.load_data');
Route::post('/filter', 'AjaxController@filterData')->name('filterdata');
// Route::get('/get-image/{resto_id}', 'AjaxController@fetch_image');


