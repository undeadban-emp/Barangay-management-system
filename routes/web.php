<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\user\UserDashboardController;
use App\Http\Controllers\User\UserCertificateController;
use App\Http\Controllers\user\UserBlotterRecordController;
use App\Http\Controllers\superadmin\account\UserController;
use App\Http\Controllers\user\UserBarangayOfficialController;
use App\Http\Controllers\superadmin\settings\RegionController;
use App\Http\Controllers\superadmin\settings\BarangayController;
use App\Http\Controllers\superadmin\settings\ProvinceController;
use App\Http\Controllers\user\UserBarangayInformationController;
use App\Http\Controllers\user\UserResidentInformationController;
use App\Http\Controllers\superadmin\SuperAdminDashboardController;
use App\Http\Controllers\superadmin\settings\MunicipalityController;

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
    // resident
    Route::get("/resident-information", [UserResidentInformationController::class, 'index'])->name('user.resident.information');
    Route::get("/resident-information/create", [UserResidentInformationController::class, 'create'])->name('user.create.resident.information');
    Route::post("/resident-information/store", [UserResidentInformationController::class, 'store'])->name('user.store.resident.information');
    // certificate
    Route::get("/certificate", [UserCertificateController::class, 'index'])->name('user.certificate');
    Route::get("/certificate/list/view", [UserCertificateController::class, 'list'])->name('user.list.certificate');
    Route::get("/certificate/previewedprint/{type?}/{person_status?}", [UserCertificateController::class, 'previewedprint'])->name('user.previewedprint.certificate');
    // Route::post("/certificate/store", [UserCertificateController::class, 'store'])->name('user.store.certificate');



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

    // province
    Route::get("/province/index", [ProvinceController::class, 'index'])->name('province.settings.superadmin');
    Route::get("/province/list", [ProvinceController::class, 'list'])->name('province.list.settings.superadmin');
    Route::post("/province/settings/store", [ProvinceController::class, 'store'])->name('province.store.settings.superadmin');
    Route::post("/province/settings/update/{id}", [ProvinceController::class, 'update'])->name('province.update.settings.superadmin');
    Route::delete("/province/settings/destroy/{id}", [ProvinceController::class, 'destroy'])->name('province.destroy.settings.superadmin');

    // municipality
    Route::get("/municipality/index", [MunicipalityController::class, 'index'])->name('municipality.settings.superadmin');
    Route::get("/municipality/list", [MunicipalityController::class, 'list'])->name('municipality.list.settings.superadmin');
    Route::post("/municipality/settings/store", [MunicipalityController::class, 'store'])->name('municipality.store.settings.superadmin');
    Route::post("/municipality/settings/update/{id}", [MunicipalityController::class, 'update'])->name('municipality.update.settings.superadmin');
    Route::delete("/municipality/settings/destroy/{id}", [MunicipalityController::class, 'destroy'])->name('municipality.destroy.settings.superadmin');

    // barangay
    Route::get("/barangay/index", [BarangayController::class, 'index'])->name('barangay.settings.superadmin');
    Route::get("/barangay/list", [BarangayController::class, 'list'])->name('barangay.list.settings.superadmin');
    Route::post("/barangay/settings/store", [BarangayController::class, 'store'])->name('barangay.store.settings.superadmin');
    Route::post("/barangay/settings/update/{id}", [BarangayController::class, 'update'])->name('barangay.update.settings.superadmin');
    Route::delete("/barangay/settings/destroy/{id}", [BarangayController::class, 'destroy'])->name('barangay.destroy.settings.superadmin');

    // account
    // user
    Route::get("/account/index", [UserController::class, 'index'])->name('account.superadmin');
    Route::get("/account/list", [UserController::class, 'list'])->name('account.list.superadmin');
    Route::post("/account/store", [UserController::class, 'store'])->name('account.store.superadmin');
});