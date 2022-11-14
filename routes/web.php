<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\SubscriptionController;

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

Route::get('/', [WeatherController::class, 'index'])->name('index');

Route::get('forecast', [WeatherController::class, 'forecast'])->name('forecast');

Route::group(['prefix' => 'mailinglist', 'as' => 'mailinglist.'], function ()
{
    Route::get('subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');
    Route::get('unsubscribe/{token}', [SubscriptionController::class, 'unsubscribe'])->name('unsubscribe');

    Route::post('subscribe', [SubscriptionController::class, 'doSubscribe'])->name('doSubscribe');
});