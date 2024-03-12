<?php

use App\Http\Controllers\PostCategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostTagController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TestTypeController;
use App\Http\Controllers\UserBalanceController;
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
Route::get('yangiliklar/{slug}', [PostController::class, 'show'])
    ->name('post');
Route::get('yangiliklar-turi/{postCategory}/{slug}', [PostCategoryController::class, 'show'])
    ->name('post-category.show');
Route::get('yangiliklar-teg-boyicha/{postTag}/{slug}', [PostTagController::class, 'show'])
    ->name('post-tag.show');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'prevent-back-button',
])->group(function () {

    Route::get('fan/{name}', [TestTypeController::class, 'index'])
        ->name('subject');

    Route::get('test/{test_type}', [ResultController::class, 'store'])
        ->name('result.create');

    Route::post('test', [TestController::class, 'store'])
        ->name('test.store');

    Route::get('natijalar', [ResultController::class, 'index'])
        ->name('result.index');

    Route::put('user-info/{userInfo}', [UserInfoController::class, 'update'])
        ->name('user-info.update');

    Route::get('balans', [UserBalanceController::class, 'edit'])
        ->name('user-balance.edit');

    Route::post('balance-yangilash', [UserBalanceController::class, 'update'])
        ->name('user-balance.update');

//    redirect to payment system or payment form
    Route::any('/pay/{paysys}/{key}/{amount}', function ($paysys, $key, $amount) {
        $model = Goodoneuz\PayUz\Services\PaymentService::convertKeyToModel($key);
        (new Goodoneuz\PayUz\PayUz)
            ->driver($paysys)
            ->redirect($model, $amount, 860, \route('home'));
    })->name('pay');
});
