<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\PostCategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostTagController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TestTypeController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UserBalanceController;
use App\Http\Controllers\UserController;
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

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])
    ->middleware('guest')
    ->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

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

// handle requests from payment system
Route::any('/handle/{paysys}',function($paysys){
    (new Goodoneuz\PayUz\PayUz)->driver($paysys)->handle();
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'prevent-back-button',
])->group(function () {

    Route::get('test-turi/{test_type}/fanlar', [SubjectController::class, 'index'])
        ->name('subject.list');

    Route::get('fan/{subject_id}', [SubjectController::class, 'degree'])
        ->name('subject.degree');

    Route::get('test/{test_type}{subject}', [ResultController::class, 'store'])
        ->name('result.create');

    Route::post('test', [TestController::class, 'store'])
        ->name('test.store');

    Route::get('natijalar', [ResultController::class, 'index'])
        ->name('result.index');

    Route::get('natijalar/{result}', [ResultController::class, 'detailedResult'])
        ->name('results.detailed');

    Route::put('user-info/{userInfo}', [UserInfoController::class, 'update'])
        ->name('user-info.update');

    Route::get('balans', [UserBalanceController::class, 'edit'])
        ->name('user-balance.edit');

    Route::post('balance-yangilash', [UserBalanceController::class, 'update'])
        ->name('user-balance.update');

    Route::get('profile-edit/{user_id}', [UserController::class, 'edit'])
        ->name('profile.edit');
    Route::post('profile-update', [UserController::class, 'update'])
        ->name('profile.update');

    Route::get('fanlar/mavzulashgan-test', [TopicController::class, 'index'])
        ->name('topics.index');

    Route::get('mavzulashgan-test/fanlar', [SubjectController::class, 'topicSubjects'])
        ->name('topic-test.subjects');

    Route::get('test/{subject}/{topic}', [ResultController::class, 'storeForTopic'])
        ->name('topic-result.create');

    Route::get('natural-science/test', [ResultController::class, 'storeForNaturalScience'])
        ->name('natural-science.result.create');

    Route::get('aralash/test/{subject_id}', [ResultController::class, 'storeMixedQuize'])
        ->name('mixed.test.create');

    Route::post('/complaints', [ComplaintController::class, 'store'])->name('complaints.store');


//    redirect to payment system or payment form
    Route::any('/pay/{paysys}/{key}/{amount}', function ($paysys, $key, $amount) {
        $model = Goodoneuz\PayUz\Services\PaymentService::convertKeyToModel($key);
        (new Goodoneuz\PayUz\PayUz)
            ->driver($paysys)
            ->redirect($model, $amount, 860, \route('home'));
    })->name('pay');
});
