<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CareerJobController;
use App\Http\Controllers\UserJobController;
use App\Http\Controllers\ApplicationController;

Route::get('/admin', function () {
    return view('admin.pages.index');
});

// Career Job Routes
Route::prefix('admin')->group(function () {
    Route::get('/create-job', [CareerJobController::class, 'create'])->name('jobs.create');
    Route::post('/store-job', [CareerJobController::class, 'store'])->name('jobs.store');
    Route::get('/jobs', [CareerJobController::class, 'index'])->name('jobs.index');
    Route::get('/jobs/{id}/edit', [CareerJobController::class, 'edit'])->name('jobs.edit');
    Route::put('/jobs/{id}', [CareerJobController::class, 'update'])->name('jobs.update');
    Route::delete('/jobs/{id}', [CareerJobController::class, 'destroy'])->name('jobs.destroy');



});

Route::get('/', [UserJobController::class, 'index'])->name('user.index');
// Applications



Route::get('/apply/{job}', [ApplicationController::class, 'create'])->name('applications.create');



Route::post('/apply', [ApplicationController::class, 'store'])->name('applications.store');
