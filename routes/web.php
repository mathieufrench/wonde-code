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



Route::get('/', 'App\Http\Controllers\CoreController@index')->name('index');
Route::get('/teacher/{id}/classes', 'App\Http\Controllers\CoreController@classes')->name('schedule');
Route::get('/class/{id}', 'App\Http\Controllers\CoreController@students')->name('classdetails');
