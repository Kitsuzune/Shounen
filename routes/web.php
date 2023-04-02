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

Route::get('/', function () {
    return view('Homepage');
});


Route::get('upload', function () {
    return view('formupload');
});


Route::post('/upload',[PostController::class,'store']);


Route::get('login', function () {
    return view('login');
})->middleware('guest');

Route::post('/register',[RegisterController::class,'store']);
Route::post('/login',[RegisterController::class,'index']);
Route::post('/logout',[RegisterController::class,'logout']);

