<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BlogController;

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'submitContact'])->name('contact.submit');

// Services
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');

// Staff
Route::get('/our-team', [StaffController::class, 'index'])->name('staff.index');
Route::get('/our-team/{slug}', [StaffController::class, 'show'])->name('staff.show');

// Appointments
Route::get('/appointments', [AppointmentController::class, 'create'])->name('appointments.create');
Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
Route::get('/appointments/success', [AppointmentController::class, 'success'])->name('appointments.success');

// Blog
Route::get('/resources', [BlogController::class, 'index'])->name('blog.index');
Route::get('/resources/{slug}', [BlogController::class, 'show'])->name('blog.show');
