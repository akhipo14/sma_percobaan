<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KetenagaanController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RuangController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('admin.main');
});

// dasboard
Route::get('/admin-dashboard', function () {
    return view('admin.dashboard');
});

//ketenagaan
Route::get('admin-ketenagaan',[KetenagaanController::class,'index']);
Route::post('admin-ketenagaan',[KetenagaanController::class,'store']);
Route::put('admin-ketenagaan/{id}',[KetenagaanController::class,'update']);
Route::delete('admin-ketenagaan/{id}',[KetenagaanController::class,'destroy']);

// Ruang
Route::get('admin-ruang',[RuangController::class,'index']);
Route::post('admin-ruang',[RuangController::class,'store']);

//kategori
Route::get('admin-kategori',[KategoriController::class,'index']);
Route::get('/admin-kategori/slug',[KategoriController::class,'createslug']);
Route::post('/admin-kategori',[KategoriController::class,'store']);
Route::put('/admin-kategori/{id}',[KategoriController::class,'update']);
Route::delete('/admin-kategori/{id}',[KategoriController::class,'destroy']);

// post
Route::get('/admin-post',[PostController::class,'index']);
Route::get('/admin-add-post',[PostController::class,'create']);
Route::get('/admin-post/{id}/edit',[PostController::class,'edit']);
Route::put('/admin-post/{post}',[PostController::class,'update'])->name('posts.update');
Route::get('/admin-post/{id}/show',[PostController::class,'show']);
Route::post('/admin-add-post',[PostController::class,'store']);
Route::delete('/admin-post/{id}',[PostController::class,'destroy']);

Route::get('/test/show', function () {
    return view('admin.post.test');
});


// user
Route::get('/beranda', function () {
    return view('user.beranda');
});
