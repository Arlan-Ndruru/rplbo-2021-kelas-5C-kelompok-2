<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\dashboard\DashboardInstanceController;
use App\Http\Controllers\dashboard\DashboardSkeluarController;
use App\Http\Controllers\dashboard\DashboardSmasukController;
use App\Http\Controllers\dashboard\DashboardUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| 
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/about', function () {
    return view('about');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::group(['middleware' => ['auth', 'role:user']], function () {
    Route::get('/dashboard/uploudberkas', [DashboardController::class, 'create'])->name('userberkasCreate');
    Route::get('/dashboard/uploudberkas/checkSlug', [DashboardController::class, 'checkSlug']);
    Route::post('/dashboard/uploudberkas/', [DashboardController::class, 'store'])->name('userberkasStore');
});

Route::group(['middleware' => ['auth', 'role:administrator|kepalaSekolah|stafTU|receptionist']], function () {
    Route::get('/dashboard/users/', [DashboardUserController::class, 'index'])->name('dashUsers');
    Route::get('/dashboard/users/create', [DashboardUserController::class, 'create'])->name('dashUserAdd');
    // Route::get('/dashboard/users/checkSlug', [DashboardUserController::class, 'checkSlug']);
    Route::post('/dashboard/users/', [DashboardUserController::class, 'store'])->name('dashUserStore');
    Route::delete('/dashboard/users/{user:email}', [DashboardUserController::class, 'destroy'])->name('dashUserDelete');
    Route::get('/dashboard/users/{user:email}', [DashboardUserController::class, 'show'])->name('dashUserShow');
    Route::put('/dashboard/users/{user:email}', [DashboardUserController::class, 'update'])->name('dashUserUpdate');
    Route::get('/dashboard/users/{user:email}/edit', [DashboardUserController::class, 'edit'])->name('dashUserEdit');
});

Route::group(['middleware' => ['auth', 'role:administrator|kepalaSekolah|stafTU|receptionist']], function () {
    Route::get('/dashboard/instances/', [DashboardInstanceController::class, 'index'])->name('dashInstances');
    Route::get('/dashboard/instances/create', [DashboardInstanceController::class, 'create'])->name('dashInstanceAdd');
    Route::get('/dashboard/instances/checkSlug', [DashboardInstanceController::class, 'checkSlug'])->name('dashInstanceCS');
    Route::post('/dashboard/instances/', [DashboardInstanceController::class, 'store'])->name('dashInstanceStore');
    Route::delete('/dashboard/instances/{instance:slug}', [DashboardInstanceController::class, 'destroy'])->name('dashInstanceDelete');
    Route::get('/dashboard/instances/{instance:slug}', [DashboardInstanceController::class, 'show'])->name('dashInstanceShow');
    Route::put('/dashboard/instances/{instance:slug}', [DashboardInstanceController::class, 'update'])->name('dashInstanceUpdate');
    Route::get('/dashboard/instances/{instance:slug}/edit', [DashboardInstanceController::class, 'edit'])->name('dashInstanceEdit');
});

Route::group(['middleware' => ['auth', 'role:administrator|kepalaSekolah|kepalaTU|stafTU']], function () {
    Route::get('/dashboard/suratmasuk/', [DashboardSmasukController::class, 'index'])->name('dashSmasuks');
    Route::get('/dashboard/suratmasuk/create', [DashboardSmasukController::class, 'create'])->name('dashSmasukAdd');
    Route::get('/dashboard/suratmasuk/checkSlug', [DashboardSmasukController::class, 'checkSlug'])->name('dashSmasukCS');
    Route::post('/dashboard/suratmasuk/', [DashboardSmasukController::class, 'store'])->name('dashSmasukStore');
    Route::delete('/dashboard/suratmasuk/{file:slug}', [DashboardSmasukController::class, 'destroy'])->name('dashSmasukDelete');
    Route::get('/dashboard/suratmasuk/{file:slug}', [DashboardSmasukController::class, 'show'])->name('dashSmasukShow');
    Route::put('/dashboard/suratmasuk/{file:slug}', [DashboardSmasukController::class, 'update'])->name('dashSmasukUpdate');
    Route::get('/dashboard/suratmasuk/{file:slug}/edit', [DashboardSmasukController::class, 'edit'])->name('dashSmasukEdit');
});

Route::group(['middleware' => ['auth', 'role:administrator|kepalaSekolah|kepalaTU|stafTU']], function () {
    Route::get('/dashboard/suratkeluar/', [DashboardSkeluarController::class, 'index'])->name('dashSkeluars');
    Route::get('/dashboard/suratkeluar/create', [DashboardSkeluarController::class, 'create'])->name('dashSkeluarAdd');
    Route::get('/dashboard/suratkeluar/checkSlug', [DashboardSkeluarController::class, 'checkSlug'])->name('dashSkeluarCS');
    Route::post('/dashboard/suratkeluar/', [DashboardSkeluarController::class, 'store'])->name('dashSkeluarStore');
    Route::delete('/dashboard/suratkeluar/{file:slug}', [DashboardSkeluarController::class, 'destroy'])->name('dashSkeluarDelete');
    Route::get('/dashboard/suratkeluar/{file:slug}', [DashboardSkeluarController::class, 'show'])->name('dashSkeluarShow');
    Route::put('/dashboard/suratkeluar/{file:slug}', [DashboardSkeluarController::class, 'update'])->name('dashSkeluarUpdate');
    Route::get('/dashboard/suratkeluar/{file:slug}/edit', [DashboardSkeluarController::class, 'edit'])->name('dashSkeluarEdit');
});

require __DIR__.'/auth.php';
