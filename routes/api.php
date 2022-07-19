<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoriesController;
use App\Http\Resources\CategoriesResource;
use App\Http\Controllers\Api\ArticlesController;
use App\Http\Resources\ArticlesResource;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::group(['prefix' => 'v1', 'middleware' => ['auth:api']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/categories/search/{name}', [CategoriesController::class, 'search']);
    Route::get('/categories/{id}', [CategoriesController::class, 'detail']);
    Route::apiResource('categories', CategoriesController::class);

    Route::get('/articles/search/{title}', [ArticlesController::class, 'search']);
    Route::get('/articles/{id}', [ArticlesController::class, 'detail']);
    Route::apiResource('articles', ArticlesController::class);
});