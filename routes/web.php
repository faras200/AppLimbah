<?php

use UniSharp\LaravelFilemanager\Lfm;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostinganController;
use App\Http\Controllers\PenjemputanController;
use App\Http\Controllers\AdministratorController;

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

    Route::get('/media', function(){
        return view('dashboard.media.index');
    });

    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('Dashboard');

    Route::resource('/administrator', AdministratorController::class)->names([
        'index' => 'Administrator',
        'create' => 'Administrator Create',
        'edit' => 'Administrator Edit',
    ]);
    Route::get('/administrator/delete/{id}', [AdministratorController::class, 'destroy']);
    Route::get('/post/delete/{id}', [PostinganController::class, 'destroy']);

    Route::resource('/profile', ProfileController::class)->names([
        'index' => 'Profile',
    ]);

    Route::resource('/post', PostinganController::class)->names([
        'index' => 'Postingan',
    ]);
    Route::resource('/penjemputan', PenjemputanController::class)->names([
        'index' => 'Penjemputan',
    ]);
    Route::resource('/laporan', LaporanController::class)->names([
        'index' => 'Laporan',
    ]);
});

require __DIR__ . '/auth.php';
