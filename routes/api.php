<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PurchaseController;
use App\Http\Controllers\Api\TicketController;
use App\Http\Controllers\Api\TestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Authentication Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Test Routes
Route::get('/test-db', [TestController::class, 'testPurchases']);

// Public Routes
Route::get('/tickets', [TicketController::class, 'index']);
Route::get('/tickets/{id}', [TicketController::class, 'show']);

// Protected Routes (Require Authentication)
Route::middleware('auth:sanctum')->group(function () {
    // User Routes
    Route::get('/user', [AuthController::class, 'user']);
    Route::put('/user', [AuthController::class, 'updateProfile']);
    Route::delete('/user', [AuthController::class, 'deleteAccount']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Purchase Routes
    Route::get('/purchases', [PurchaseController::class, 'getUserPurchases']);
    Route::post('/purchases', [PurchaseController::class, 'purchaseTicket']);
    Route::post('/bookings', [PurchaseController::class, 'createBooking']);
    Route::get('/purchases/{id}', [PurchaseController::class, 'getPurchaseDetail']);
    Route::put('/purchases/{id}/cancel', [PurchaseController::class, 'cancelPurchase']);

    // Test Routes
    Route::get('/test-auth', [TestController::class, 'testAuth']);
});
