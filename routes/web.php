<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ContactUsController;
use App\Models\Rate;
use Doctrine\DBAL\Driver\Middleware;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/form', [HomeController::class, 'form'])->name('form');
    Route::post('/receive', [HomeController::class, 'receive'])->name('receive');
    Route::post('/posts/registComment/{id}', [PostController::class, 'registComment'])->name('registComment');
    Route::get('/posts/{id}', [PostController::class, 'index'])->name('post');
    Route::post('/like/{id}', [PostController::class, 'likeItem'])->name('like');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::post('/block/{id}', [AdminController::class, 'blockUser'])->name('blockUser');
    Route::get('/account', [AccountController::class, 'index'])->name('myAccount');
    Route::get('/online', [ChatController::class, 'userOnline'])->name('userOnline');
    Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact-us');
    Route::post('/post-admin_message', [ContactUsController::class, 'sendMessage'])->name('sendMessageAdmin');
    Route::get('/setPP', [AccountController::class, 'setPP'])->name('setPP');
    Route::post('/postPP', [AccountController::class, 'pp'])->name('postPP');
    Route::get('/bestpost', [PostController::class, 'bestPost'])->name('bestpost');
    Route::get('/create', [PostController::class, 'newPost'])->name('newPost');
    Route::post('/create', [PostController::class, 'createPost'])->name('createPost');
});
require __DIR__.'/auth.php';
