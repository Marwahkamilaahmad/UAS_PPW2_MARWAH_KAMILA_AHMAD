<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/buku',BukuController::class)->middleware('auth');
// Route::resource('/buku',[BukuController::class,'index'])->middleware('auth');
Route::get('/buku/{buku}', [BukuController::class, 'show'])->middleware('auth')->name('buku.show');
Route::get('/buku/page', [BukuController::class, 'search'])->middleware('auth')->name('buku.search');

Route::get('/detail-buku/{title}', [BukuController::class, 'galbuku'])->middleware('auth')->name('galeri.detail');
Route::get('/', [BukuController::class, 'galbuku'])->name('galeri.buku');

Route::get('/buku/{buku}/edit', [BukuController::class, 'edit'])->middleware('auth')->name('buku.edit');
Route::post('/buku/{buku}/edit', [BukuController::class, 'update'])->middleware('auth')->name('buku.update');
Route::get('/buku/{buku}/favourite', [BukuController::class, 'addToFav'])->middleware('auth')->name('buku.favourite');
Route::get('/bukuPopuler', [BukuController::class, 'populerBook'])->middleware('auth')->name('buku.populer');
Route::get('/tambahKategori/{buku}', [BukuController::class, 'tambahKategori'])->middleware('auth')->name('tambah.kategori');
Route::post('/bukuKategori/{kategori}', [BukuController::class, 'simpanKategori'])->middleware('auth');


Route::get('/favourite', [BukuController::class, 'liatFav'])->middleware('auth');

Route::delete('/buku/{buku}', [BukuController::class, 'destroy'])->middleware('auth')->name('buku.destroy');

require __DIR__.'/auth.php';
