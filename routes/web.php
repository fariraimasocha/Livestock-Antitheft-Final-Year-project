<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LivestockController;
use Illuminate\Support\Facades\Route;

Route::middleware(['splade'])->group(function () {
    Route::get('/', fn () => view('auth.login'))->name('auth');
    Route::get('/docs', fn () => view('docs'))->name('docs');
    Route::get('/login', fn () => view('auth.login'))->name('login');
    Route::get('/register', fn () => view('auth.register'))->name('register');
    Route::get('/home', fn () => view('home.index'))->name('home');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::resource('livestock', LivestockController::class);
    Route::resource('employees', EmployeeController::class);

    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();
});
