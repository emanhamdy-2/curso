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


Auth::routes();

Route::get('/', function () {
  return view('home');
})->middleware('auth');

Route::view('/cajones','cajones');
Route::view('/tipos','tipos');
Route::view('/cajas','cajas');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
