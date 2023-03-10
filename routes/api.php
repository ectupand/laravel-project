<?php

use App\Http\Controllers\Api\LikeController;
use App\Http\Controllers\API\ViewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\CommentController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources(['comments' => CommentController::class]);

Route::post('articles/{slug}/comment', [CommentController::class, 'store']);
Route::get('articles/{slug}/like', [LikeController::class, 'show']);
Route::get('articles/{slug}/view', [ViewController::class, 'show']);


