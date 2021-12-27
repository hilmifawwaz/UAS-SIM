<?php

use App\Http\Controllers\API\PresenceController;
use App\Http\Controllers\API\UserController;
use App\Models\PresenceDetail;
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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [UserController::class, 'fetch']);
    Route::post('user', [UserController::class, 'updateProfile']);
    Route::post('logout', [UserController::class, 'logout']);
    Route::get('presence', [PresenceController::class, 'all']);
    Route::post('checkout', [PresenceController::class, 'checkout']);
});

Route::get('types', [App\Http\Controllers\API\TypeController::class, 'all']);
Route::get('activities', [App\Http\Controllers\API\ActivityController::class, 'all']);

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
Route::get('users', [UserController::class, 'users']);
