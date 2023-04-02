<?php

use App\Http\Controllers\ImagesUploadController;
use App\Http\Controllers\pharmacyController;
use App\Http\Controllers\ProfileController;
use App\Models\images_upload;
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
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('send-mail',[EmailController::class]);
    Route::post('upload',[ImagesUploadController::class,'create'])->name('upload');
    Route::get('prescription_view',[pharmacyController::class,'prescription_view'])->name('prescription_view');
    Route::get('prescription_quotation/{id}',[pharmacyController::class,'prescription_quotation'])->name('prescription_quotation');

});
require __DIR__.'/auth.php';



