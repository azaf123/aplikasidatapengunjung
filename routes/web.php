<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\FungsiController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\VisitorController;

use App\Http\Controllers\DashboardPetugas;
use App\Http\Controllers\DataController;

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

// Route::get('/', function () {
//     return view('templates.master');
// });
// Route::group(['middleware'=>['auth','admin']],function(){


Route::get('/pengunjungkeluar', [VisitorController::class, 'keluarForm']);
Route::post('/keluar', [VisitorController::class, 'keluar']);
Route::get('/karyawan/{id}', [VisitorController::class, 'karyawanTofungsi']);
Route::get('/visitor/{id}', [VisitorController::class, 'visitorToAlamat']);



// });






Route::resource('/', FrontendController::class);
Route::post('/isibukuform', [FrontendController::class, 'isiBukuform']);
Route::get('isibuku', [FrontendController::class, 'isiBuku']);

Route::get('/keluarpengunjungform', [FrontendController::class, 'keluarPengunjungForm']);
Route::post('/keluarpengunjung', [FrontendController::class, 'keluarPengunjung']);

Route::get('sendmail', [MailController::class, 'sendEmail']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login_store']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'register_store']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/loginPetugas', [AuthUserController::class, 'loginPetugas'])->name('loginPetugas');
Route::post('/loginPetugas', [AuthUserController::class, 'login_store_petugas']);
Route::get('/registerPetugas', [AuthUserController::class, 'registerPetugas']);
Route::post('/registerPetugas', [AuthUserController::class, 'register_store_petugas']);
Route::get('/logout', [AuthUserController::class, 'logout']);

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::prefix('master-data')->group(function () {
        Route::resource('fungsi', FungsiController::class);
        Route::resource('officer', OfficerController::class);
        Route::resource('employee', EmployeeController::class);
        Route::resource('card', CardController::class);
        Route::resource('visitor', VisitorController::class);
        Route::get('/exportvisitor', [VisitorController::class, 'visitorexport']);
        Route::post('/importemployee', [EmployeeController::class, 'importEmployee']);
        Route::get('/importemployeeview', [EmployeeController::class, 'importEmployeeView']);
        Route::post('/importcard', [CardController::class, 'importCard']);
        Route::get('/importcardview', [CardController::class, 'importCardView']);
        Route::resource('/', DashboardController::class);
        Route::prefix('laporan')->group(function () {
            Route::get('cetakformpertanggal', [ReportController::class, 'cetakFormPertanggal']);
            Route::resource('laporan', ReportController::class);
        });
    });
});
Route::group(['middleware' => ['authuser', 'user']], function () {
    Route::prefix('master-data-petugas')->group(function () {
        Route::get('/', [DashboardPetugas::class, 'dashboardPetugas']);
        Route::get('/laporan', [DashboardPetugas::class, 'laporanVisitor']);
        Route::get('cetak', [ReportController::class, 'cetak']);
   
    });
});

Route::get('cetakpertanggal', [ReportController::class, 'cetakError']);
Route::get('cetakpertanggal/{tglawal}/{tglakhir}/{fungsi}', [ReportController::class, 'cetakPertanggal']);
Route::get('cetakpertanggal/{tglawal}/{tglakhir}', [ReportController::class, 'cetakPertanggalWithoutFungsi']);
