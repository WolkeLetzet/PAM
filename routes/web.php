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

    if (Auth::check()) {
        return redirect(route('index'));
    }
    return view('auth.login');
})->name('login');





Route::view('/kachipum', 'ppt.kachipum');

//Rutas potegidas
Route::namespace('App\Http\Controllers')->middleware('auth')->group(function () {
    Route::resource('index', 'ComputadorController');
    Route::get('comp/index', 'ComputadorController@index')->name('index');
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
    Route::get('my/forgeOfGods/{id}', 'UserController@forgeOfGods')->name('forgeOfGods');
    Route::get('user/profile', 'UserController@profile')->name('user-profile');
    //Route::view('user/settings/', 'user.setting')->name('settings-user');
    Route::get('user/setting/password/','HomeController@showChangePassword')->name('cambiar-contraseña');
    Route::post('user/setting/password/','HomeController@verificarContraseña')->name('verficar-password');

    Route::post('user/profile','HomeController@guardarNombre')->name('cambiar-nombre');

    Route::group(['middleware' => ['role:admin']], function () {
        //

        Route::get('user/new/user/', 'UserController@crearUsuario')->name('create-user');
        Route::get('user/all/users', 'UserController@showAllUsers')->name('all-user');
        Route::post('user/save/user', 'UserController@storeUsuario')->name('save-user');
        Route::get('user/setting/admin', 'UserController@changeRoles')->name('setting-roles');
        Route::post('user/setting/admin', 'UserController@setRoles')->name('set-roles');
   
    });
    
});



Route::group(['middleware' => ['role:admin|user']], function () {
    //



});


Auth::routes();
