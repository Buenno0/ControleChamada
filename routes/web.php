<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\AttendanceController;


Route::middleware(['auth'])->group(function () {
    Route::get('/classes', [ClassController::class, 'index'])->name('classes.index');
    Route::get('/classes/create', [ClassController::class, 'create'])->name('classes.create');
    Route::post('/classes', [ClassController::class, 'store'])->name('classes.store');
    Route::get('/classes/{class}', [ClassController::class, 'show'])->name('classes.show');
    
    Route::post('/attendances', [AttendanceController::class, 'store'])->name('attendances.store');
});

