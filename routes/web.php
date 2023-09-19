<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\ReportController;

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

Route::get('/roomdetail', function () {
    return view('roomdetail/room-detail');
})->name('roomdetail');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/inform/report', function () {
    return view('/Client/Inform/report');
});
Route::get('/inform/repair-rq', function () {
    return view('/Client/Inform/repair-request');
});
Route::get('/inform/maidcall', function () {
    return view('/Client/Inform/maidcall');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/paymentlist', [PaymentController::class, 'show'])->name('payment');
    Route::get('reserve', [ReserveController::class, 'index']);
    Route::post('/upload', 'App\Http\Controllers\FileController@upload')->name('upload.file');
    Route::get('/inform', [ReportController::class, 'index'])->name('inform');
    Route::get('/test', function () {
        return view('/Client/test'); //Testing passing username variable (ไม่ต้องสนใจก็ได้)
    });
});


Route::get('reserve', [ReserveController::class, 'index'])->name('reservepage')->middleware('checkreservelogin');
Route::post('addinfo', [ReserveController::class, 'addinfo']);

Route::post('/upload', 'ReserveController@upload')->name('file.upload');

require __DIR__.'/auth.php';
