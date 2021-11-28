<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {return view('auth.login');});
// Route::get('/producto', function () {return view('producto.index');});
// Route::get('producto/create', [ProductoController::class, 'create'])->name('producto.create');
Route::resource('producto', ProductoController::class)->middleware('auth');
Auth::routes(['reset'=>false]);

Route::get('/home', [ProductoController::class, 'index'])->name('home');
Route::group(['middleware' =>'auth'],function(){
    Route::get('/', [ProductoController::class,'index'])->name('home');
});