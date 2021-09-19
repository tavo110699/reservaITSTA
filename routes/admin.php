<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
Route::get('admin',[HomeController::class,'index']);
Route::resource('places','App\Http\Controllers\PlaceController');

Route::get('', function () {
    return view('welcome');
});
