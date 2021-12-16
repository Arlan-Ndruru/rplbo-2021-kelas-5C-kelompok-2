<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\DashboardController;
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


Route::group(['middleware' => ['auth', 'role:administrator']], function () {
    Route::get('/dashboard/users/', [DashboardUserController::class, 'index'])->name('dashUsers');
    Route::get('/dashboard/users/create', [DashboardUserController::class, 'create'])->name('dashUserAdd');
    // Route::get('/dashboard/users/checkSlug', [DashboardUserController::class, 'checkSlug']);
    Route::post('/dashboard/users/', [DashboardUserController::class, 'store'])->name('dashUserStore');
    Route::delete('/dashboard/users/{user:email}', [DashboardUserController::class, 'destroy'])->name('dashUserDelete');
    Route::get('/dashboard/users/{user:email}', [DashboardUserController::class, 'show'])->name('dashUserShow');
    Route::put('/dashboard/users/{user:email}', [DashboardUserController::class, 'update'])->name('dashUserUpdate');
    Route::get('/dashboard/users/{user:email}/edit', [DashboardUserController::class, 'edit'])->name('dashUserEdit');
});

require __DIR__.'/auth.php';
