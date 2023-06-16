<?php

use App\Http\Controllers\Api\TestSdkController;
use App\Telegram\Commands\AboutCommand;
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

Route::post('/{env("TELEGRAM_BOT_TOKEN")}/webhook', function () {
    Log::info("--- commands ---");
    $commands = [
        AboutCommand::class
    ];
    Telegram::addCommands($commands);
    $commandsHandler = Telegram::commandsHandler(true);
    $updates = Telegram::getWebhookUpdates();
    $res1 = json_decode($updates, true);
    Log::info("--- callback_query ---");
    Log::info($res1['message']['text']);
    Log::info($updates->message->entities['type']);
    Log::info("-------");

    if (($updates->message->entities) && ($updates->message->entities->type == 'bot_command')) {
        Log::info("Command: ". $updates->message->text);
    } else {
        Log::info("Text: ". $updates->message->text);
    }


    // //$command = "yourCommand" for example, $arguments = array of something
    // $res = Telegram::getCommandBus()->execute($res1['message']['text'], [], $commandsHandler);
    // Log::info("---2---");
    // Log::info($res);
    // Log::info("-------");
    // // return Telegram::commandsHandler(true);
});

Route::resource('tests', TestSdkController::class);
