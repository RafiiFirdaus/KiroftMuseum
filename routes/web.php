<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Authentication Routes - menggunakan design yang sudah dibuat
Route::get('/auth', function () {
    return view('auth.login');
})->name('auth');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.login');
})->name('register');

Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

// User Dashboard
Route::get('/user-dashboard', function () {
    return view('user-dashboard');
})->name('user.dashboard');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/museums', [HomeController::class, 'museums'])->name('museums');
Route::get('/museums/{province}', [HomeController::class, 'museumsByProvince'])->name('museums.province');
Route::get('/museum/{province}/{slug}', [HomeController::class, 'museumDetail'])->name('museums.detail');

// My Tickets Route
Route::get('/my-tickets', function () {
    return view('my-tickets');
})->name('my.tickets');

// FAQ Route
Route::get('/faq', function () {
    return view('faq');
})->name('faq');

// Booking Routes
Route::get('/museum/{province}/{slug}/booking', [HomeController::class, 'museumBooking'])->name('museums.booking');
Route::post('/booking/submit', [HomeController::class, 'bookingSubmit'])->name('museums.booking.submit');

// Test Route
Route::get('/test-api', function () {
    return view('test-api');
})->name('test.api');

Route::get('/quick-test', function () {
    return view('quick-test');
})->name('quick.test');

// Test login route
Route::get('/test-login', function () {
    return view('test-login');
})->name('test.login');
