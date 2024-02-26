<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\TestTypeController;
use App\Http\Controllers\UserInfoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [SiteController::class, 'index'])
    ->name('home');
Route::get('yangiliklar/', [PostController::class, 'index'])
    ->name('posts');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('fan/{name}', [TestTypeController::class, 'index'])
        ->name('subject');

    Route::put('user-info/{userInfo}', [UserInfoController::class, 'update'])
        ->name('user-info.update');
});
