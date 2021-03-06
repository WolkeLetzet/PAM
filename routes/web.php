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
    return redirect('index');
})->name('index');


Route::namespace('App\Http\Controllers')->group(function(){
    Route::resource('index','ComputadorController');
    Route::get('comp/create',    'ComputadorController@create')->name('create');
    Route::get('comp/edit/{id}', 'ComputadorController@edit')->name('edit');
    Route::get('comp/show/{id}', 'ComputadorController@show')->name('show');
    Route::post('comp/create',   'ComputadorController@store')->name('store');
    Route::post('comp/edit/{id}', 'ComputadorController@update')->name('update');

    Route::post('comp/show/{id}/delete','ComputadorController@destroy')->name('destroy');

    Route::post('comp/show/{computer_id}/{comentario_id}','ComputadorController@destroyComentario')->name('destroyComentario');

    Route::get('comp/show/{computer_id}/comment/add/','ComputadorController@agregarComentario')->name('addcomentario');

    Route::post('comp/show/{computer_id}/comment/add/','ComputadorController@guardarComentario')->name('guardarComentario');

    Route::get('comp/show/comment/add/{id}','ComputadorController@editarComentario')->name('editcomentario');

    Route::put('comp/show/comment/add/{id}','ComputadorController@updateComentario')->name('updateComentario');
    
});
Route::view('/kachipum', 'ppt.kachipum');




