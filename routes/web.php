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

Route::resource('/pendidikan', PendidikanController::class);
// approve
Route::post('/approve-pendidikan/{id}' ,[verifikasiController::class, 'ApprovePendidikan'])->name('approve.pendidikan');
// rejected
Route::post('/rejected-pendidikan/{id}' ,[verifikasiController::class, 'RejectedPendidikan'])->name('rejected.pendidikan');
Route::resource('/penelitian', PenelitianController::class);
Route::resource('/pengabdian', PengabdianController::class);
Route::resource('/penunjang', PenunjangController::class);
Route::resource('/aika', AikaController::class);

Route::resource('/dosen', dosenController::class);



});




Route::middleware(['Dosen'])->group( function(){



});










});

