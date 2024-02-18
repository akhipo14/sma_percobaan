<?php

use App\Http\Controllers\GalleryController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KetenagaanController;
use App\Http\Controllers\PelajaranController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\SDMController;
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

// Gallery
Route::get('/admin-gallery',[GalleryController::class,'index']);
Route::get('/admin-gallery/add',[GalleryController::class,'create']);
Route::post('/admin-gallery/add',[GalleryController::class,'store']);
Route::get('/admin-gallery/{id}/edit',[GalleryController::class,'edit']);
Route::put('/admin-gallery/{gallery}',[GalleryController::class,'update'])->name('gallery.update');
Route::delete('/admin-gallery/{id}',[GalleryController::class,'destroy']);

// SDM
Route::get('/admin-sdm',[SDMController::class,'index']);
Route::get('/admin-sdm/add',[SDMController::class,'create']);
Route::post('/admin-sdm/add',[SDMController::class,'store']);
Route::get('/admin-sdm/{id}/edit',[SDMController::class,'edit']);
Route::put('/admin-sdm/{sdm}',[SDMController::class,'update'])->name('sdm.update');
Route::delete('/admin-sdm/{sdm}',[SDMController::class,'destroy']);

// jadwal
Route::get('/admin-jadwal',[JadwalController::class,'index']);


// kelas
Route::get('admin-kelas',[KelasController::class,'index']);
Route::post('/admin-kelas',[KelasController::class,'store']);
Route::put('/admin-kelas/{kelas}',[KelasController::class,'update'])->name('kelas.update');
Route::delete('/admin-kelas/{id}',[KelasController::class,'destroy']);

// pelajaran
Route::get('admin-pelajaran',[PelajaranController::class,'index']);
Route::post('/admin-pelajaran',[PelajaranController::class,'store']);
Route::put('/admin-pelajaran/{pelajaran}',[PelajaranController::class,'update'])->name('pelajaran.update');
Route::delete('/admin-pelajaran/{id}',[PelajaranController::class,'destroy']);

Route::get('/test', function () {
    return view('test');
});


// user
Route::get('/beranda', function () {
    return view('user.beranda');
});
