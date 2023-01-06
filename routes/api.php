<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogPostsController;
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

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function () {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::group([

    'middleware' => 'jwt.verify',
    'prefix' => 'blog'

], function () {
    Route::get('/', [BlogPostsController::class, 'index']);
    Route::get('/{id}', [BlogPostsController::class, 'show']);
    Route::post('/', [BlogPostsController::class, 'store']);
    Route::put('/{id}', [BlogPostsController::class, 'update']);
    Route::delete('{id}', [BlogPostsController::class, 'destroy']);
});