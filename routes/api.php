<?php

use App\Http\Controllers\Api\Dev\PostController;
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

Route::middleware('auth:sanctum')->get('/api/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth')->group(function () {
    Route::post('/post/like/{id}', [PostController::class, 'likePost'])->name('like');
    Route::post('/post/dislike/{id}', [PostController::class, 'dislikePost'])->name('post.dislike');
});
