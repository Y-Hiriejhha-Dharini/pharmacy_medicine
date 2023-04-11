<?php

use App\Http\Controllers\EmailController;
use App\Http\Controllers\ImagesUploadController;
use App\Http\Controllers\pharmacyController;
use App\Http\Controllers\ProfileController;
use App\Models\images_upload;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Auth::user()->role;
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('send-mail',[EmailController::class,'send_mail'])->middleware('role:0');
    Route::post('upload',[ImagesUploadController::class,'create'])->middleware('role:0')->name('upload');
    Route::get('prescription_view',[pharmacyController::class,'prescription_view'])->middleware('role:1')->name('prescription_view');
    Route::get('prescription_quotation/{id}',[pharmacyController::class,'prescription_quotation'])->middleware('role:1')->name('prescription_quotation');
    Route::get('drug_search',[pharmacyController::class,'drug_search'])->name('drug_search');
    Route::get('prescription_upload',[pharmacyController::class,'prescription_upload'])->name('prescription_upload');
    Route::get('csv_upload_view',[pharmacyController::class,'csv_upload_view'])->name('csv_upload_view');
    Route::post('csv_upload',[pharmacyController::class,'csv_upload'])->name('csv_upload');
    Route::get('csv_download',[pharmacyController::class,'csv_download'])->name('csv_download');
    Route::get('email_accept',[pharmacyController::class,'email_accept'])->name('email_accept');
    Route::get('cancel',[pharmacyController::class,'cancel'])->name('cancel');
    Route::get('mark-as-read', [pharmacyController::class,'markAsRead'])->name('mark-as-read');
});
require __DIR__.'/auth.php';



