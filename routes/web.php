<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventoController;
use App\Models\Evento;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/evento',[\App\Http\Controllers\EventoController::class,'index']);
Route::post('evento/agregar',[\App\Http\Controllers\EventoController::class,'store']);
Route::get('/evento/mostrar',[\App\Http\Controllers\EventoController::class,'show']);
Route::post('evento/editar/{id}',[\App\Http\Controllers\EventoController::class,'edit']);
Route::post('evento/modificar/{evento}',[\App\Http\Controllers\EventoController::class,'update']);
Route::post('evento/borrar/{id}',[\App\Http\Controllers\EventoController::class,'destroy']);
Route::resource('evento', \App\Http\Controllers\EventoController::class);


Route::group(['middleware' => ['auth:sanctum', 'verified']], function() {
    Route::resource('roles', \App\Http\Controllers\RoleController::class);
    Route::resource('users', \App\Http\Controllers\UserController::class);
    Route::get('/permissions', [\App\Http\Controllers\PermissionController::class, 'index'])->name('permissions.index');
});
