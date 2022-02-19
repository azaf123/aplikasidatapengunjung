<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\FungsiController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\WebcamController;
use App\Models\Officer;
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
    return view('templates.master');
});

Route::resource('visitor', VisitorController::class);
Route::resource('fungsi', FungsiController::class); 
Route::resource('officer', OfficerController::class);
Route::resource('employee',EmployeeController::class);
Route::resource('laporan', ReportController::class);
Route::get('cetak',[ReportController::class,'cetak']);
Route::get('cetakformpertanggal',[ReportController::class,'cetakFormPertanggal']);
Route::get('cetakpertanggal/{tglawal}/{tglakhir}',[ReportController::class,'cetakPertanggal']);
Route::resource('webcams',WebcamController::class);
Route::resource('dashboard', DashboardController::class);
Route::get('/karyawan/{id}',[VisitorController::class,'karyawanTofungsi']);

Route::resource('landingpage',FrontendController::class);
Route::get('isibuku',[FrontendController::class,'isiBuku']);
