<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\FungsiController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\WebcamController;
use App\Models\Officer;
use App\Models\Visitor;

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
    
    Route::resource('visitor', VisitorController::class);
    Route::get('/pengunjungkeluar',[VisitorController::class,'keluarForm']);
    Route::post('/keluar',[VisitorController::class,'keluar']);
    Route::get('/karyawan/{id}',[VisitorController::class,'karyawanTofungsi']);
    
    Route::resource('fungsi', FungsiController::class); 
    
    Route::resource('officer', OfficerController::class);
    
    Route::resource('employee',EmployeeController::class);
    
    Route::resource('card', CardController::class);
    
    Route::resource('laporan', ReportController::class);
    Route::get('cetak',[ReportController::class,'cetak']);
    Route::get('cetakformpertanggal',[ReportController::class,'cetakFormPertanggal']);
    Route::get('cetakpertanggal/{tglawal}/{tglakhir}',[ReportController::class,'cetakPertanggal']);
// });

Route::resource('webcams',WebcamController::class);

Route::resource('/', DashboardController::class);


Route::resource('landingpage',FrontendController::class);
Route::post('/isibukuform',[FrontendController::class,'isiBukuform']);
Route::get('isibuku',[FrontendController::class,'isiBuku']);

Route::get('/keluarpengunjungform',[FrontendController::class,'keluarPengunjungForm']);
Route::post('/keluarpengunjung',[FrontendController::class,'keluarPengunjung']);

Route::get('sendmail',[MailController::class,'sendEmail']);

Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login' ,[AuthController::class,'login_store']);
Route::get('/register',[AuthController::class, 'register']);
Route::post('/register',[AuthController::class, 'register_store']);
Route::get('/logout',[AuthController::class,'logout']);