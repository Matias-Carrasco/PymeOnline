<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TiendaController;

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
    return view('home');
});

Auth::routes();




/*
    NO BORRAR LOS COMENTARIOS Route::group!!!
    Agregar dentro de los grupos las vistas que correspondan a cada rol.

    Dscomentar los grupos cuando se terminen de hacer pruebas o se suba todo a la main branch!
*/

Route::middleware(['CheckBan'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    
    Route::group(['middleware' => 'CheckRole:admin'], function () {
        Route::get('admin/banear/{id}','\App\Http\Controllers\AdminController@banear');
        Route::get('admin/desbanear/{id}','\App\Http\Controllers\AdminController@desbanear');
        Route::resource('admin', '\App\Http\Controllers\AdminController');


    });

    Route::group(['middleware' => 'CheckRole:cliente'], function () {


    });


    Route::group(['middleware' => 'CheckRole:tienda'], function () {
        Route::resource('producto', '\App\Http\Controllers\ProductoController');
        Route::resource( 'tags', TagController::class );
        Route::resource('tienda', TiendaController::class);
    });

});


