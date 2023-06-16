<?php

use App\Http\Controllers\Api\TestSdkController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Telegram\Bot\Laravel\Facades\Telegram;

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

Route::post('/{env("TELEGRAM_BOT_TOKEN")}/webhook', function ($request) {
    Log::info("ok123");
    Log::info($request);
    // $commands = [...];
    // $telegram->addCommands($commands);
    // $commandsHandler = $telegram->commandsHandler(true);
    // //$command = "yourCommand" for example, $arguments = array of something
    // $res = $telegram->getCommandBus()->execute($command, $arguments, $commandsHandler);
    // return Telegram::commandsHandler(true);
});

Route::resource('tests', TestSdkController::class);
