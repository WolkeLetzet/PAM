<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

    if(Auth::check()){
        return redirect(route('index'));
    }
    return view('auth.login');
})->name('login');



Route::view('/kachipum', 'ppt.kachipum');

//Rutas potegidas
Route::namespace('App\Http\Controllers')->middleware('auth')->group(function () {
        Route::resource('index', 'ComputadorController');
        Route::get('comp/index','ComputadorController@index')->name('index');
        Route::get('comp/create',    'ComputadorController@create')->name('create');
        Route::get('comp/edit/{id}', 'ComputadorController@edit')->name('edit');
        Route::get('comp/show/{id}', 'ComputadorController@show')->name('show');
        Route::post('comp/create',   'ComputadorController@store')->name('store');
        Route::post('comp/edit/{id}', 'ComputadorController@update')->name('update');

        Route::post('comp/show/{id}/delete', 'ComputadorController@destroy')->name('destroy');

        Route::post('comp/show/{computer_id}/{comentario_id}', 'ComputadorController@destroyComentario')->name('destroyComentario');

        Route::get('comp/show/{computer_id}/comment/add/', 'ComputadorController@agregarComentario')->name('addcomentario');

        Route::post('comp/show/{computer_id}/comment/add/', 'ComputadorController@guardarComentario')->name('guardarComentario');

        Route::get('comp/show/comment/add/{id}', 'ComputadorController@editarComentario')->name('editcomentario');

        Route::put('comp/show/comment/add/{id}', 'ComputadorController@updateComentario')->name('updateComentario');
        Route::get('comp/imprimir/{id}', 'ComputadorController@imprimir')->name('imprimirCompu');
});

    Route::view('/register', 'auth.register');
    Route::view('/confirm', 'auth.passwords.confirm');
    Route::view('/email', 'auth.passwords.email');
    Route::view('/reset', 'auth.passwords.reset');

    Auth::routes();

    
