<?php

use App\Http\Controllers\AbsenSdmController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KetenagaanController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PelajaranController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\SDMController;
use App\Http\Controllers\SDMUserController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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




// user
Route::middleware(['guest'])->group (function(){
Route::get('/',[UserController::class,'index']) ;
Route::get('/sambutan', function () {
    return view('user.sambutan.index');
});
Route::get('/visi-misi', function () {
    return view('user.visimisi.index');
});
Route::get('/branding', function () {
    return view('user.branding.index');
});
Route::get('/fasilitas',[FasilitasController::class,'index']);
Route::get('/guru-dan-karyawan',[SDMUserController::class,'index']);
Route::get('/berita',[BeritaController::class,'index']);
Route::get('/berita/{post}',[UserController::class,'blog_single']);
Route::get('/berita-kategori/{slug}',[UserController::class,'blog_kategori']);
Route::get('/prestasi',[PrestasiController::class,'show']);
Route::get('/kontak',[KontakController::class,'index']);
Route::get('/jadwal_kelas',[JadwalController::class,'jadwaluser']);
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'authenticate']);
Route::get('/register',[RegisterController::class,'index']);
Route::post('/register',[RegisterController::class,'store']);
Route::get('/absen-sdm',[AbsenSdmController::class,'create']);
Route::post('/absen-sdm',[AbsenSdmController::class,'store']);
Route::get('/forgot-password',[ForgotPasswordController::class,'index'])->name('forgot.password');
Route::post('/forgot-password',[ForgotPasswordController::class,'store'])->name('forgot.password.post');
Route::get('/reset-password/{token}',[ForgotPasswordController::class,'resetpassword'])->name('reset.password');
Route::post('/reset-password',[ForgotPasswordController::class,'resetpasswordpost'])->name('reset.password.post');
Route::get('/classroom',[ClassroomController::class,'indexuser']);
Route::post('/sendmail',[SendMailController::class,'sendMail']);
// dasboard
// Route::get('/admin-dashboard', function () {
//     return view('admin.dashboard');
// });
// Route::get('/notifabsen',[AbsenSdmController::class,'notifabsen']);
});

Route::fallback(function () {
    return view('backoff'); // Anda dapat mengganti '/' dengan URL halaman lain yang ingin Anda tuju
});

Route::middleware(['auth'])->group (function(){
// logout
Route::post('/logout',[LoginController::class,'logout']);
// dashboard
Route::get('admin-dashboard',[DashboardController::class,'index']);

// absen sdm
Route::get('/admin-absen-sdm',[AbsenSdmController::class,'index'])->name('sdms.index');
Route::get('/admin-absen-sdm/cetak_pdf/{inputDate}',[AbsenSdmController::class,'cetak_pdf']);
Route::get('/admin-absen-sdm-show', [AbsenSdmController::class, 'show'])->name('absensdms.show');
//ketenagaan
Route::get('admin-ketenagaan',[KetenagaanController::class,'index']);
Route::post('admin-ketenagaan',[KetenagaanController::class,'store']);
Route::put('admin-ketenagaan/{id}',[KetenagaanController::class,'update']);
Route::delete('admin-ketenagaan/{id}',[KetenagaanController::class,'destroy']);

// Ruang
Route::get('admin-ruang',[RuangController::class,'index']);
Route::post('admin-ruang/add',[RuangController::class,'store']);
Route::get('/admin-ruang/add',[RuangController::class,'create']);
Route::get('/admin-ruang/{id}/edit',[RuangController::class,'edit']);
Route::put('admin-ruang/{ruang}',[RuangController::class,'update'])->name('ruangs.update');
Route::delete('admin-ruang{id}',[RuangController::class,'destroy'])->name('ruangs.delete');


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
Route::delete('/admin-gallery/{id}',[GalleryController::class,'destroy'])->name('galleris.delete');

// SDM
Route::get('/admin-sdm',[SDMController::class,'index']);
Route::get('/admin-sdm/add',[SDMController::class,'create']);
Route::post('/admin-sdm/add',[SDMController::class,'store']);
Route::get('/admin-sdm/{id}/edit',[SDMController::class,'edit']);
Route::put('/admin-sdm/{sdm}',[SDMController::class,'update'])->name('sdm.update');
Route::delete('/admin-sdm/{sdm}',[SDMController::class,'destroy']);

// jadwal
Route::get('/admin-jadwal',[JadwalController::class,'index'])->name('jadwal.index');;
Route::get('/admin-jadwal/{kelas_id}/{hari_id}/edit',[JadwalController::class,'edit']);
Route::put('/admin-jadwal/{kelas_id}/{hari_id}',[JadwalController::class,'update'])->name('jadwal.update');

// kelas
Route::get('admin-kelas',[KelasController::class,'index']);
Route::post('/admin-kelas',[KelasController::class,'store']);
Route::put('/admin-kelas/{kelas}',[KelasController::class,'update'])->name('kelas.update');
Route::delete('/admin-kelas/{kelas}',[KelasController::class,'destroy'])->name('kelas.delete');

// pelajaran
Route::get('admin-pelajaran',[PelajaranController::class,'index']);
Route::post('/admin-pelajaran',[PelajaranController::class,'store']);
Route::put('/admin-pelajaran/{pelajaran}',[PelajaranController::class,'update'])->name('pelajaran.update');
Route::delete('/admin-pelajaran/{pelajaran}',[PelajaranController::class,'destroy'])->name('pelajaran.delete');

// prestasi
Route::get('admin-prestasi',[PrestasiController::class,'index']);
Route::post('/admin-prestasi/add',[PrestasiController::class,'store']);
Route::get('/admin-prestasi/add',[PrestasiController::class,'create']);
Route::get('/admin-prestasi/{id}/edit',[PrestasiController::class,'edit']);
Route::put('/admin-prestasi/{id}',[PrestasiController::class,'update']);
Route::delete('/admin-prestasi/{id}',[PrestasiController::class,'destroy']);

// classroom
Route::get('admin-classroom',[ClassroomController::class,'index']);
Route::post('/admin-classroom/add',[ClassroomController::class,'store']);
Route::get('/admin-classroom/add',[ClassroomController::class,'create']);
Route::get('/admin-classroom/{id}/edit',[ClassroomController::class,'edit']);
Route::put('/admin-classroom/{id}',[ClassroomController::class,'update']);
Route::delete('/admin-classroom/{id}',[ClassroomController::class,'destroy']);
});


Route::get('/test', function () {
    return view('test');
});


Route::get('/form', function () {
    return view('date-form');
});

Route::post('/process', function (Request $request) {
    $tanggal = $request->input('tanggal');
    $tahun = date('Y', strtotime($tanggal));
    return view('result', ['tahun' => $tahun]);
});

// user
Route::get('/beranda', function () {
    return view('user.beranda');
});
