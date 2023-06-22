<?php

use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\Api\Telegram\WebhookController;

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

Route::prefix('telegram')->group(function() {
    if (Schema::hasTable('settings')) {
        $model = Settings::first();
        Route::post('/'.$model->token.'/webhook', [WebhookController::class, 'index']);
    }
});

