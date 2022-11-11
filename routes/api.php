<?php

use App\Http\Controllers\Api\BooksController;
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

Route::prefix('books')->group(function () {
    Route::get('', [BooksController::class, 'index']);
    Route::post('', [BooksController::class, 'store']);
    Route::put('/{book}', [BooksController::class, 'update']);
    Route::delete('/{book}', [BooksController::class, 'destroy']);
});
