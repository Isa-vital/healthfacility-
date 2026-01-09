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

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Guest routes (login)
    Route::middleware('guest')->group(function () {
        Route::get('/login', [App\Http\Controllers\Admin\AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [App\Http\Controllers\Admin\AuthController::class, 'login']);
    });

    // Protected admin routes
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::post('/logout', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

        // Services Management
        Route::resource('services', App\Http\Controllers\Admin\ServiceController::class)->except(['show']);

        // Staff Management
        Route::resource('staff', App\Http\Controllers\Admin\StaffController::class)->except(['show']);

        // Blog Posts Management
        Route::resource('blog', App\Http\Controllers\Admin\BlogController::class)->except(['show']);

        // Appointments Management
        Route::get('appointments', [App\Http\Controllers\Admin\AppointmentController::class, 'index'])->name('appointments.index');
        Route::get('appointments/{appointment}', [App\Http\Controllers\Admin\AppointmentController::class, 'show'])->name('appointments.show');
        Route::delete('appointments/{appointment}', [App\Http\Controllers\Admin\AppointmentController::class, 'destroy'])->name('appointments.destroy');

        // Testimonials Management
        Route::resource('testimonials', App\Http\Controllers\Admin\TestimonialController::class)->except(['show']);
    });
});
