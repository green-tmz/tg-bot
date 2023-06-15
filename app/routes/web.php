<?php

use Illuminate\Support\Facades\Route;
use Telegram\Bot\Laravel\Facades\Telegram;

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

Route::get('/', function() {
    return redirect('/login');
});

Route::get('/setwebhook', function () {
    $response = Telegram::setWebhook(['url' => 'https://green-soft.pro/api/{env("TELEGRAM_BOT_TOKEN")}/webhook']);
    dd($response);
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
