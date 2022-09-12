<?php

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
 * Get all users
 */
Route::get('/user', function () {
    return User::all();
});

/**
 * Get user by id
 */
Route::get('/user/{id}', function ($id) {
    return User::findorFail($id);
});

/**
 * Insert new user
 */
Route::post('/user', function (Request  $req) {
    User::create($req->all());
    return User::all();
});

/**
 * Update user by id
 */
Route::put('/user/{id}', function ($id, Request  $req) {
    $user = User::findorFail($id);
    $user->update($req->all());
    return $user;
});


/**
 * Delete user by id
 */
Route::delete('/user/{id}', function ($id) {
    User::findorFail($id)->delete();
    return User::all();
});
