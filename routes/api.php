<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\ArticlesController;
use App\Http\Controllers\API\CategoryController;

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

Route::post('login',  [UserController::class, 'login']);
Route::post('register',  [UserController::class, 'register']);

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details',  [UserController::class, 'details']);

    Route::post('create',  [ArticlesController::class, 'create']);
    Route::get('listAll',  [ArticlesController::class, 'listAll']);
    Route::get('show/{id}',  [ArticlesController::class, 'show']);
    Route::post('update/{id}',  [ArticlesController::class, 'update']);
    Route::delete('delete/{id}',  [ArticlesController::class, 'delete']);

    // Route::post('create',  [CategoryController::class, 'create']);
    // Route::get('listAll',  [CategoryController::class, 'listAll']);
    // Route::get('showDetail/{id}',  [CategoryController::class, 'showDetail']);
    // Route::post('update/{id}',  [CategoryController::class, 'update']);
    // Route::delete('delete/{id}',  [CategoryController::class, 'delete']);
});

