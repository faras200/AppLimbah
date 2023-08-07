<?php

use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PenjemputanController;
use App\Http\Controllers\PostinganController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use UniSharp\LaravelFilemanager\Lfm;

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

Route::get('/', [HomeController::class, 'index']);

Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
        Lfm::routes();
    });

    Route::get('/media', function () {
        return view('dashboard.media.index');
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('Dashboard');

    Route::resource('/administrator', AdministratorController::class)->names([
        'index' => 'Administrator',
        'create' => 'Administrator Create',
        'edit' => 'Administrator Edit',
    ]);
    Route::get('/administrator/delete/{id}', [AdministratorController::class, 'destroy']);
    Route::get('/post/delete/{id}', [PostinganController::class, 'destroy']);
    Route::get('/users/delete/{id}', [UsersController::class, 'destroy']);
    Route::get('/transaksi/delete/{id}', [TransaksiController::class, 'destroy']);
    Route::get('/penjemputan/delete/{id}', [PenjemputanController::class, 'destroy']);

    Route::put('/profile/alamat/{id}', [ProfileController::class, 'updatealamat']);

    Route::resource('/profile', ProfileController::class)->names([
        'index' => 'Profile',
    ]);

    Route::resource('/post', PostinganController::class)->names([
        'index' => 'Postingan',
    ]);
    Route::resource('/penjemputan', PenjemputanController::class)->names([
        'index' => 'Penjemputan',
        'store' => 'create.penjemputan',
    ]);
    Route::resource('/laporan', LaporanController::class)->names([
        'index' => 'Laporan',
    ]);
    Route::get('/laporan/cetak', [LaporanController::class, 'cetak']);

    Route::resource('/users', UsersController::class)->names([
        'index' => 'Users',
    ]);

    Route::resource('/transaksi', TransaksiController::class)->names([
        'index' => 'Transaksi',
        'store' => 'create.transaksi',
    ]);

    Route::post('/transaksi/selesai', [TransaksiController::class, 'selesai'])->name('transaksi.selesai');
    Route::post('/penjemputan/selesai', [PenjemputanController::class, 'selesai'])->name('penjemputan.selesai');

    Route::resource('/komentar', CommentsController::class);
});

require __DIR__ . '/auth.php';
