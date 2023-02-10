<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\user\UserDashboardController;
use App\Http\Controllers\user\UserBlotterRecordController;
use App\Http\Controllers\user\UserBarangayOfficialController;
use App\Http\Controllers\superadmin\settings\RegionController;
use App\Http\Controllers\user\UserBarangayInformationController;
use App\Http\Controllers\user\UserResidentInformationController;
use App\Http\Controllers\superadmin\SuperAdminDashboardController;

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
    return view('auth.login');
});

Auth::routes();

// user route
Route::middleware(['auth', 'user-role:user'])->prefix('user')->group(function(){
    Route::get("/home", [UserDashboardController::class, 'index'])->name('home');
    Route::get("/barangay-official", [UserBarangayOfficialController::class, 'index'])->name('user.barangay.official');
    Route::get("/barangay-information", [UserBarangayInformationController::class, 'index'])->name('user.barangay.information');
    Route::get("/resident-information", [UserResidentInformationController::class, 'index'])->name('user.resident.information');
    Route::get("/blotter-report", [UserBlotterRecordController::class, 'index'])->name('user.blotter.report');
});

// admin route
Route::middleware(['auth', 'user-role:admin'])->prefix('admin')->group(function()
{
    Route::get("/home", [HomeController::class, 'adminHome'])->name('home.admin');
});

// superadmin route
Route::middleware(['auth', 'user-role:superadmin'])->prefix('superadmin')->group(function()
{
    Route::get("/home", [SuperAdminDashboardController::class, 'index'])->name('home.superadmin');

    // settings

    // region
    Route::get("/region/index", [RegionController::class, 'index'])->name('region.settings.superadmin');
    Route::get("/region/list", [RegionController::class, 'list'])->name('region.list.settings.superadmin');
    Route::post("/region/settings/store", [RegionController::class, 'store'])->name('region.store.settings.superadmin');
    Route::post("/region/settings/update/{id}", [RegionController::class, 'update'])->name('region.update.settings.superadmin');
    Route::delete("/region/settings/destroy/{id}", [RegionController::class, 'destroy'])->name('region.destroy.settings.superadmin');
});