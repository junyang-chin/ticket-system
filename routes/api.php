<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Http\Resources\TicketStatusResource;
use App\Models\TicketStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * User login logout
 */
Route::post('/login-user', [AuthController::class, 'login']);
Route::post('/logout-user', [AuthController::class, 'logout'])->middleware('auth:sanctum');

/**
 * Api that requires authentiction
 */
Route::middleware(['auth:sanctum'])->group(function () {
    // user
    //TODO separte store
    Route::apiResources([
        '/user' => UserController::class,
        '/ticket' => TicketController::class,
    ]);


    // status list
    Route::get('/ticket-statuses', function () {
        return  TicketStatusResource::collection(TicketStatus::all());
    });

    // search ticket
    Route::post('/ticket/search', [TicketController::class, 'search']);
});

// Create User Api without authentication
Route::post('/register-user', [UserController::class, 'register']);
