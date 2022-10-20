<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Http\Resources\TicketStatusResource;
use App\Models\Assignment;
use App\Models\Category;
use App\Models\TicketPriority;
use App\Models\TicketStatus;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
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
Route::post("/login-user", [AuthController::class, "login"]);
Route::post("/logout-user", [AuthController::class, "logout"])->middleware(
    "auth:sanctum"
);

/**
 * Api that requires authentiction
 */
Route::middleware(["auth:sanctum"])->group(function () {
    // user
    //TODO separate store
    Route::apiResources([
        "user" => UserController::class,
        "ticket" => TicketController::class,
    ]);

    //ticket assignments
    Route::resource('tickets.assignments', AssignmentController::class)->only(['index', 'store', 'destroy'])->scoped([
        'assignment' => 'developer_id'
    ]);

    // user assignments
    Route::get('assignments', [AssignmentController::class, 'find']);

    // category list
    Route::get('category', function () {
        return ['data' => Category::all()];
    });

    // status list
    Route::get("ticket-status", function () {
        return ['data' => TicketStatus::all()];
    });

    // priority list
    Route::get("ticket-priority", function () {
        return ['data' => TicketPriority::all()];
    });


    // search ticket
    Route::post("ticket/search", [TicketController::class, "search"]);

    // all ticket
    Route::get("all-tickets", [TicketController::class, "all"]);



    // search developer
    Route::post("developer/search", [UserController::class, "search"]);
});

// Create User Api without authentication
Route::post("register-user", [UserController::class, "register"]);
