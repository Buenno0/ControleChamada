<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\QrCodeTestController;


require __DIR__.'/auth.php';



Route::post('/classes', [ClassController::class, 'store'])->name('classes.store');
Route::get('/profile', [UserProfileController::class, 'show'])->name('profile')->middleware('auth');

Route::get('dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/qrcode-test', [QrCodeTestController::class, 'generate']);

Route::middleware(['auth'])->group(function () {
    Route::get('/classes', [ClassController::class, 'index'])->name('classes.index');
    Route::get('/classes/create', [ClassController::class, 'create'])->name('classes.create');
    Route::post('/classes', [ClassController::class, 'store'])->name('classes.store');
    Route::get('/classes/{class}', [ClassController::class, 'show'])->name('classes.show');  
    Route::post('/attendances', [AttendanceController::class, 'store'])->name('attendances.store');
});



