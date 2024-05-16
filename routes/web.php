<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\VehicleController;
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






Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Permission
    Route::get('/permission/create', [PermissionController::class, 'create'])->name('permission.create');
    Route::get('/permission/{id}', [PermissionController::class, 'show'])->name('permission.show');
    Route::get('/permission', [PermissionController::class, 'index'])->name('permission.index');
    Route::patch('/permission/approve/{id}', [PermissionController::class, 'approve'])->name('permission.approve');
    Route::patch('/permission/reject/{id}', [PermissionController::class, 'reject'])->name('permission.reject');
    Route::post('/permission', [PermissionController::class, 'store'])->name('permission.store');


    // Office
    Route::get('/office', [OfficeController::class, 'index'])->name('office.index');
    Route::get('/office/create', [OfficeController::class, 'create'])->name('office.create');
    Route::get('/office/{id}', [OfficeController::class, 'show'])->name('office.show');
    Route::get('/office/{id}/edit', [OfficeController::class, 'edit'])->name('office.edit');
    Route::patch('/office/{id}/update', [OfficeController::class, 'update'])->name('office.update');
    Route::post('/office', [OfficeController::class, 'store'])->name('office.store');


    // Vehicles
    Route::get('/vehicle', [VehicleController::class, 'index'])->name('vehicle.index');
    Route::get('/vehicle/create', [VehicleController::class, 'create'])->name('vehicle.create');
    Route::get('/vehicle/{id}', [VehicleController::class, 'show'])->name('vehicle.show');
    Route::post('/vehicle', [VehicleController::class, 'store'])->name('vehicle.store');

    // Staff
    Route::get('/staff', [StaffController::class, 'index'])->name('staff.index');


    // Exports
    Route::get('dashboard/export', [DashboardController::class, 'export'])->name('dashboard.export');
});
