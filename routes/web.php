<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionController;
use App\Models\Office;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    $datas = Office::all();
    return view('auth.register', compact('datas'));
});


// Permission
Route::get('/permission/create', [PermissionController::class, 'create'])->name('permission.create');
Route::get('/permission', [PermissionController::class, 'index'])->name('permission.index');
Route::post('/permission', [PermissionController::class, 'store'])->name('permission.store');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
