<?php

use App\Http\Controllers\VehicleController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\TripController;
use Illuminate\Support\Facades\Route;
use App\Models\Vehicle;
Route::get('/', function () {
    return view('welcome');
});

Route::resource('vehicles',VehicleController::class);
Route::resource('drivers', DriverController::class);
Route::resource('trips', TripController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/get-drivers', [DriverController::class, 'getDrivers'])->name('get_drivers');
Route::post('/get-vehicles', [VehicleController::class, 'getVehicles'])->name('get_vehicles');
