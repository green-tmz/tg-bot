<?php

use App\Http\Controllers\Api\Telegram\MainController;
use App\Http\Controllers\Api\Telegram\WebhookController;
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

Route::prefix('telegram')->group(function() {
    Route::get('/setwebhook', [WebhookController::class, 'setWebhook']);

    Route::get('/setname', [MainController::class, 'setName']);
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
