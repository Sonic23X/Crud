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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('club', [App\Http\Controllers\ClubController::class, 'index'])->name('home-club');
Route::get('/agregar', [\App\Http\Controllers\ClubController::class, 'create'])->name('create');
Route::post('/store', [\App\Http\Controllers\ClubController::class, 'store'])->name('store');
Route::get('/editar/{id}', [\App\Http\Controllers\ClubController::class, 'edit'])->name('edit');
Route::put('/update/{id}', [\App\Http\Controllers\ClubController::class, 'update'])->name('update'); 
Route::delete('/delete/{id}', '\App\Http\Controllers\ClubController@delete')->name('delete');

//Route::get('/editar/{id}', [\App\Http\Controllers\ClubController::class, 'edit'])->name('edit');
Route::get('/cities/{id}', [\App\Http\Controllers\ClubController::class, 'getCityByAjax'])->name('getCityByAjax');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
