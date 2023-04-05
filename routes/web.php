<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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



Route::get('/',[PostController::class,'index']);
Route::get('/search',[PostController::class,'search']);




Route::get('upload', function () {
    return view('formupload');
})->middleware('auth');

Route::get('/user/post',[PostController::class,'tampil']);



Route::post('/upload',[PostController::class,'store']);
Route::get('/upload/slug',[PostController::class,'buatslug'])->middleware('auth');
Route::post('/user/post/{post:slug}/delete',[PostController::class,'destroy'])->middleware('auth');
Route::get('/user/post/{post:slug}/edit',[PostController::class,'edittampil'])->middleware('auth');
Route::post('/user/post/{post:slug}/edit',[PostController::class,'update'])->middleware('auth');




Route::get('login', function () {
    return view('login');
})->middleware('guest');

Route::post('/register',[RegisterController::class,'store']);
Route::post('/login',[RegisterController::class,'index']);
Route::post('/logout',[RegisterController::class,'logout']);



