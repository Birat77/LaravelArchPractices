<?php

use App\Postcard;
use App\PostcardSendingService;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/payment', [App\Http\Controllers\PayOrderController::class, 'store'])->name('payments.store');

Route::get('/channels', [App\Http\Controllers\ChannelController::class, 'index'])->name('channels.index');

Route::get('/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('posts.create');

/**
 * learning facades
 */
Route::get('/postcard', function () {
    (new PostcardSendingService(4, 3, 'kathmandu'))->sendPostcard('Here is the gift for you', 'biratpandey77@gmail.com');
});

Route::get('/facades', function () {
    Postcard::sendPostcard('some message', 'birat@gmail.com');
});
