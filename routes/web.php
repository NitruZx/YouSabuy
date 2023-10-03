<?php

use App\Http\Controllers\InformController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\RepairRequestController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\MaidCallController;
use App\Http\Controllers\ManagePayments;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;

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
    return view('newdashboard');
});

Route::get('/newdashboard', function () {
    return view('newdashboard');
})->middleware(['auth', 'verified'])->name('newdashboard');


Route::get('/about', function () {
    return view('about');
});

Route::get('/registration', function(){
    return view('registration/registration');
});
// Route::get('/history', function() {
//     return view('history');
// });

Route::get('/cadmin', function(){
    return view('contractadmin');
});

Route::get('/roomdetail', function () {
    return view('roomdetail/room-detail');
})->middleware('checkroomdetail')->name('roomdetail');

Route::get('/unregisdetail', function(){
    return view('roomdetail/unregisroom-detail');
})->name('unregisroomdetail');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'checkregis'])->name('dashboard');

Route::post('/paymentlist/paying', function (Request $request) {
    $value = $request->totalPrice;
    return view('/Client/payment/omise/checkout')->with('total', $value);
})->name('paying');

Route::get('/inform/report', function () {
    return view('/Client/Inform/report');
});
Route::get('/inform/maidcall', function () {
    return view('/Client/Inform/maidcall');
});

Route::get('/manage-payments', [ManagePayments::class, 'index'])->name('manage.payments');
Route::get('/manage-bills', function () {
    return view('/admin/payments/manage-bill');
});
// Route::post('/checking', [])

Route::post('/paymentlist/checkout', [PaymentController::class, 'checkout'])->name('createpayment');
Route::get('/paymentlist/success', [PaymentController::class, 'success'])->name('checkout.success');
Route::get('/paymentlist/cancel', [PaymentController::class, 'cancel'])->name('checkout.cancel');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/paymentlist', [PaymentController::class, 'show'])->name('payment');
    Route::get('reserve', [ReserveController::class, 'index']);
    Route::post('/upload', 'App\Http\Controllers\FileController@upload')->name('upload.file');
    Route::get('/inform', [InformController::class, 'index'])->name('inform');
    Route::get('/inform/repair-request', [RepairRequestController::class, 'index'])->name('inform.repair-request');
    Route::get('/inform/report', [ReportController::class, 'index'])->name('inform.report');
    Route::get('/inform/maidcall', [MaidCallController::class, 'index'])->name('inform.maidcall');
    Route::get('/registration', [ReserveController::class, 'index']);
    // sent to database 
    Route::post('/inform/report/sent', [InformController::class, 'report'])->name('reporttext');
    Route::post('/inform/repair-request/sent', [InformController::class, 'repair'])->name('repairtext');

    
    // Route::get('/infrom/}', [InformController::class,'getreport']);
    Route::get('/test', function () {
        return view('uitest'); //Testing passing username variable (ไม่ต้องสนใจก็ได้)
    });
});

//report test
Route::view('/admin_report', '/admin/all_report/admin_report')->middleware('auth');
// Route::get('/admin_report');
//     return view('/admin/all_report/admin_report');

Route::get('/registration', [ReserveController::class, 'index'])->name('regpage')->middleware('checkreservelogin');
Route::post('addinfo', [ReserveController::class, 'addinfo'])->name('reg.addinfo');

Route::post('/upload', 'ReserveController@upload')->name('file.upload');


require __DIR__.'/auth.php';
