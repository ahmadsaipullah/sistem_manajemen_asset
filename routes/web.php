<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AikaController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\PenunjangController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\PenelitianController;
use App\Http\Controllers\PengabdianController;
use App\Http\Controllers\verifikasiController;
use App\Http\Controllers\Admin\{adminController,dashboardController,dosenController};
use App\Http\Controllers\CetakController;

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

require __DIR__.'/auth.php';

Route::get('/error-page', [dashboardController::class,'error'])->name('error');

Route::group(['middleware' => 'auth', 'PreventBackHistory'], function () {

// dashboard
Route::get('/', [dashboardController::class, 'index'])->name('dashboard');

// profile
Route::get('/profile/{encryptedId}/edit' ,[profileController::class, 'index'])->name('profile.index');
Route::put('/profile/password-update' ,[profileController::class, 'updatePassword'])->name('profile.updatePassword');
Route::put('/profile/{id}' ,[profileController::class, 'update'])->name('profile.update');



Route::middleware(['Admin'])->group( function(){
// crud admin
Route::resource('/admin', adminController::class);
// approve
Route::post('/approve-user/{id}' ,[verifikasiController::class, 'ApproveUser'])->name('approve.user');
// rejected
Route::post('/rejected-user/{id}' ,[verifikasiController::class, 'RejectedUser'])->name('rejected.user');
// export pdf
Route::get('export-admin', [CetakController::class, 'exportadmin'])->name('admin.pdf');



Route::resource('/pendidikan', PendidikanController::class);
// approve
Route::post('/approve-pendidikan/{id}' ,[verifikasiController::class, 'ApprovePendidikan'])->name('approve.pendidikan');
// rejected
Route::post('/rejected-pendidikan/{id}' ,[verifikasiController::class, 'RejectedPendidikan'])->name('rejected.pendidikan');
Route::get('export-pendidikan', [CetakController::class, 'exportpendidikan'])->name('pendidikan.pdf');




Route::resource('/penelitian', PenelitianController::class);
// approve
Route::post('/approve-penelitian/{id}' ,[verifikasiController::class, 'ApprovePenelitian'])->name('approve.penelitian');
// rejected
Route::post('/rejected-penelitian/{id}' ,[verifikasiController::class, 'RejectedPenelitian'])->name('rejected.penelitian');


Route::resource('/pengabdian', PengabdianController::class);
// approve
Route::post('/approve-pengabdian/{id}' ,[verifikasiController::class, 'ApprovePengabdian'])->name('approve.pengabdian');
// rejected
Route::post('/rejected-pengabdian/{id}' ,[verifikasiController::class, 'RejectedPengabdian'])->name('rejected.pengabdian');


Route::resource('/penunjang', PenunjangController::class);
// approve
Route::post('/approve-penunjang/{id}' ,[verifikasiController::class, 'ApprovePenunjang'])->name('approve.penunjang');
// rejected
Route::post('/rejected-penunjang/{id}' ,[verifikasiController::class, 'RejectedPenunjang'])->name('rejected.penunjang');


Route::resource('/aika', AikaController::class);
// approve
Route::post('/approve-aika/{id}' ,[verifikasiController::class, 'ApproveAika'])->name('approve.aika');
// rejected
Route::post('/rejected-aika/{id}' ,[verifikasiController::class, 'RejectedAika'])->name('rejected.aika');



});




Route::middleware(['Dosen'])->group( function(){

    Route::resource('/pendidikan', PendidikanController::class);
    // approve
    Route::post('/approve-pendidikan/{id}' ,[verifikasiController::class, 'ApprovePendidikan'])->name('approve.pendidikan');
    // rejected
    Route::post('/rejected-pendidikan/{id}' ,[verifikasiController::class, 'RejectedPendidikan'])->name('rejected.pendidikan');


    Route::resource('/penelitian', PenelitianController::class);
    // approve
    Route::post('/approve-penelitian/{id}' ,[verifikasiController::class, 'ApprovePenelitian'])->name('approve.penelitian');
    // rejected
    Route::post('/rejected-penelitian/{id}' ,[verifikasiController::class, 'RejectedPenelitian'])->name('rejected.penelitian');
    // export pdf
    Route::get('export-penelitian', [CetakController::class, 'exportpenelitian'])->name('penelitian.pdf');


    Route::resource('/pengabdian', PengabdianController::class);
    // approve
    Route::post('/approve-pengabdian/{id}' ,[verifikasiController::class, 'ApprovePengabdian'])->name('approve.pengabdian');
    // rejected
    Route::post('/rejected-pengabdian/{id}' ,[verifikasiController::class, 'RejectedPengabdian'])->name('rejected.pengabdian');
    // export pdf
    Route::get('export-pengabdian', [CetakController::class, 'exportpengabdian'])->name('pengabdian.pdf');


    Route::resource('/penunjang', PenunjangController::class);
    // approve
    Route::post('/approve-penunjang/{id}' ,[verifikasiController::class, 'ApprovePenunjang'])->name('approve.penunjang');
    // rejected
    Route::post('/rejected-penunjang/{id}' ,[verifikasiController::class, 'RejectedPenunjang'])->name('rejected.penunjang');
    // export pdf
    Route::get('export-penunjang', [CetakController::class, 'exportpenunjang'])->name('penunjang.pdf');


    Route::resource('/aika', AikaController::class);
    // approve
    Route::post('/approve-aika/{id}' ,[verifikasiController::class, 'ApproveAika'])->name('approve.aika');
    // rejected
    Route::post('/rejected-aika/{id}' ,[verifikasiController::class, 'RejectedAika'])->name('rejected.aika');
    // export pdf
    Route::get('export-aika', [CetakController::class, 'exportaika'])->name('aika.pdf');

});










});

