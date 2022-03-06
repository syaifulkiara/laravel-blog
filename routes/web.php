<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\HalamanController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();

Route::middleware(['auth'])->group(function () {
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/main', [App\Http\Controllers\MainController::class, 'store'])->name('main.store');
Route::resource('profil', ProfilController::class);
});
Route::middleware(['auth','is_admin'])->group(function () {
Route::resource('artikel', ArtikelController::class);
Route::resource('kategori', KategoriController::class);
Route::resource('komentar', KomentarController::class);
Route::resource('halaman', HalamanController::class);
});

Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('main');
Route::get('/{id:slug}', [App\Http\Controllers\MainController::class, 'single'])->name('main.single');