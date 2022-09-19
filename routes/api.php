<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Http\Resources\TicketStatusResource;
use App\Models\TicketStatus;
use App\Models\User;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



/**
 * User login logout
 */
Route::post('/login-user', [AuthController::class, 'login']);
Route::post('/logout-user', [AuthController::class, 'logout'])->middleware('auth:sanctum');

/**
 * Resource api
 */
Route::middleware(['auth:sanctum'])->group(function () {
    // user
    Route::apiResource('/user', UserController::class);
    // ticket
    Route::apiResource('/ticket', TicketController::class);

    // status list
    Route::get('/ticket-statuses', function () {
        return  TicketStatusResource::collection(TicketStatus::all());
    });
});
