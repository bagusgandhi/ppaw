<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\SegiEmpatController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RiwayatPangkatController;
use App\Http\Controllers\GajiController;
// use App\Http\Controllers\MstPangkatController;

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
    return redirect('/home');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/test', [TestController::class, 'index'])->name('test');

    Route::get('segi-empat/inputSegiEmpat', [SegiEmpatController::class, 'inputSegiEmpat'])->name('segi-empat.inputSegiEmpat');

    Route::get('segi-empat/inputSegiEmpat', [SegiEmpatController::class, 'inputSegiEmpat'])->name('segi-empat.inputSegiEmpat');

    Route::post('segi-empat/hasil', [SegiEmpatController::class, 'hasil'])->name('segi-empat.hasil');

    Route::get('segi-empat/inputBalok', [SegiEmpatController::class, 'inputBalok'])->name('segi-empat.inputBalok');

    Route::post('segi-empat/hasilBalok', [SegiEmpatController::class, 'hasilBalok'])->name('segi-empat.hasilBalok');

    Route::resource('/mst-pangkat', 'MstPangkatController');
    Route::resource('/jabatan','JabatanController');
    Route::resource('/pegawai','PegawaiController');
//riwayat
    Route::resource('/riwayat-pangkat','RiwayatPangkatController', [
    'names' => [
        'index' => 'riwayat-pangkat.index',
        'show' => 'riwayat-pangkat.show',
        'destroy' => 'riwayat-pangkat.destroy',
    ]]);
    Route::get('/riwayat-pangkat/{id}/edit', [RiwayatPangkatController::class, 'edit'])->name('riwayat-pangkat.edit');

    Route::get('/riwayat-pangkat/proses/{id}',[RiwayatPangkatController::class, 'proses'])->name('riwayat-pangkat.index1');

    Route::get('/riwayat-pangkat/create/{id}',[RiwayatPangkatController::class, 'create']);

//gaji
//  Route::resource('/gaji', 'GajiController');
    Route::get('/gaji', [GajiController::class, 'index'])->name('gaji.index');
    Route::post('/gaji', [GajiController::class, 'store'])->name('gaji.store');
    Route::get('/gaji/lists', [GajiController::class, 'listsGaji'])->name('gaji.lists')->middleware('prosesgaji');
// Route::get('/gaji/test', [GajiController::class, 'listsGaji'])->name('gaji.lists');
    Route::get('/count', [ProductController::class, 'index']);
    Route::get('/minmax', [ProductController::class, 'minmax']);
    Route::get('/avgsum', [ProductController::class, 'avgsum']);
    Route::get('/select', [ProductController::class, 'select']);
    Route::get('/distinct', [ProductController::class, 'distinct']);
});





