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

Route::get('/', 'PagesController@dashboard')->middleware('authresto');

// Auth
Route::post('/login', 'AuthController@login');
Route::get('/auth', 'PagesController@loginView');
Route::post('/logout', 'AuthController@logout');

// AJAX
Route::get('/get-income', 'AjaxController@getIncome')->middleware('authresto');

// CRUD
Route::post('/data-penghasilan/tambah', 'CRUDController@inputIncome')->middleware('authresto');
Route::get('/booking/terima/{traveler_id}', 'CRUDController@accBooks')->middleware('authresto');
Route::get('/booking/tolak/{traveler_id}', 'CRUDController@deniBooks')->middleware('authresto');