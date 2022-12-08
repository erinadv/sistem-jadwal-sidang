<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PerkaraController;
use App\Http\Controllers\KlasifikasiController;
use App\Http\Controllers\HakimController;
use App\Http\Controllers\RuangController;

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


Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/perkara', [PerkaraController::class, 'index'])->name('perkara');
    Route::get('/show-perkara/{id}', [PerkaraController::class, 'data'])->name('show-perkara');
    Route::get('/add-perkara', [PerkaraController::class, 'create'])->name('add-perkara');
    Route::post('/save-perkara', [PerkaraController::class, 'store'])->name('save-perkara');
    Route::get('/edit-perkara/{id}', [PerkaraController::class, 'edit'])->name('edit-perkara');
    Route::post('/update-perkara/{id}', [PerkaraController::class, 'update'])->name('update-perkara');
    Route::get('/delete-perkara/{id}', [PerkaraController::class, 'destroy'])->name('delete-perkara');

    Route::get('/klasifikasi', [KlasifikasiController::class, 'index'])->name('klasifikasi');
    Route::get('/del-klasifikasi/{id}', [KlasifikasiController::class, 'destroy'])->name('del-klasifikasi');
    Route::get('/klasifikasi-deleted', [KlasifikasiController::class, 'deletedlist'])->name('klasifikasi-deleted');
    Route::get('/klasifikasi-restore/{id?}', [KlasifikasiController::class, 'restore'])->name('klasifikasi-restore');
    Route::get('/force-klasifikasi/{id?}', [KlasifikasiController::class, 'force'])->name('force-klasifikasi');

    Route::get('/hakim', [HakimController::class, 'index'])->name('hakim');
    Route::get('/ruangsidang', [RuangController::class, 'index'])->name('ruangsidang');

});
