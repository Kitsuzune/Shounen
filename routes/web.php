<?php

use App\Http\Controllers\CarousellController;
use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;


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
Route::get('/home',[PostController::class,'index']);
Route::get('/docs',[PostController::class,'docs']);

Route::get('/up2', function () {
    return view('formupload2');
});

Route::get('/up1', function () {
    return view('formupload');
});

Route::get('upload', function () {
    return view('formupload2');
})->middleware('auth');

Route::get('/user/post',[PostController::class,'tampil']);

Route::get('/export',[PostController::class,'export']);



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



// For Admin
Route::group(['middleware' => ['auth', 'admin:admin']], function () {


    Route::get('/dashboard', [AdminController::class,'dashboard'])->name('dashboard');
    Route::get('/dashboard/postmanagement', [AdminController::class,'postmgmt'])->name('postmgmt');
    Route::get('/dashboard/usermanagement', [AdminController::class,'usermgmt'])->name('usermgmt');
    Route::get('/dashboard/carousell', [CarousellController::class,'index'])->name('index');
    Route::get('/dashboard/carousell/create', [CarousellController::class,'upload'])->name('upload');
    Route::post('/dashboard/carousell/create', [CarousellController::class,'store'])->name('store');
    Route::get('/dashboard/carousell/slug',[PostController::class,'buatslug']);


    Route::delete('/dashboard/post/{id}', [AdminController::class,'destroypost'])->name('post.delete');
    Route::delete('/dashboard/user/{id}', [AdminController::class,'destroyuser'])->name('user.delete');

    Route::get('/dashboard/post/{id}/edit', [AdminController::class,'editpost'])->name('post.edit');
    Route::put('/dashboard/post/{id}', [AdminController::class,'updatepost'])->name('post.update');
    Route::get('/dashboard/user/{id}/edit', [AdminController::class,'edituser'])->name('user.edit');
    Route::put('/dashboard/user/{id}', [AdminController::class,'updateuser'])->name('user.update');
    Route::post('/dashboard/carousell/{carousell:slug}/delete',[CarousellController::class,'destroy']);
    Route::get('/dashboard/carousell/{carousell:slug}/edit',[CarousellController::class,'edittampil']);
    Route::post('/dashboard/carousell/{carousell:slug}/edit',[CarousellController::class,'update']);

});





    
