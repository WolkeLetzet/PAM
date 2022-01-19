<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComputadorController;
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
    return redirect('comp');
});
Route::resource('comp',ComputadorController::class);

Route::namespace('App\Http\Controllers')->group(function(){
    Route::get('comp/create',     'ComputadorController@create')->name('create');
    Route::get('comp/edit/{id}', 'ComputadorController@edit')->name('edit');
    Route::get('comp/show/{id}', 'ComputadorController@show')->name('show');
});
Route::view('/kachipum', 'ppt.kachipum');




