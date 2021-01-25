<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('add/image',[ImageController::class,'add'])->name('add');
Route::post('save/image',[ImageController::class,'saveImage'])->name('save');
Route::delete('image/{image_id}',[ImageController::class,'deleteImage'])->name('delete');
Route::delete('delete/selected',[ImageController::class,'deleteAll'])->name('delete.all');