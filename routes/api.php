<?php

use App\Http\Controllers\TweetController;
use App\Models\Tweet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('tweets', [TweetController::class, 'index'])->name('api.tweets.list');
Route::get('tweets/{tweet}', [TweetController::class, 'findTweetById'])->name('api.tweets.findTweetById');
Route::post('tweets', [TweetController::class, 'store'])->name('api.tweets.store');

Route::get('users/{user}', function(User $user){
    return $user;
});
