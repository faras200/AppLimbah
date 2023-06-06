<?php

use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('Dashboard');

    Route::resource('/administrator', AdministratorController::class)->names([
        'index' => 'Administrator',
        'create' => 'Administrator Create',
    ]);

    Route::resource('/profile', ProfileController::class)->names([
        'index' => 'Profile',
    ]);
});

require __DIR__ . '/auth.php';
