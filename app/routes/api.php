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
    Log::info($res1);
    Log::info($updates->isType('bot_command'));
    Log::info("-------");

    if ($updates->isType('callback_query')) {

        $query = $updates->getCallbackQuery();
        $data  = $query->getData();

        Log::info("--- data ---");
        Log::info($data);
        Log::info("-------");

       //$data - here is my command (for example - "cinema")

        // $telegram->answerCallbackQuery([
        //     'callback_query_id' => $query->getId()
        // ]);

        // try{
        //     $telegram->triggerCommand($data,$commandsHandler);
        // }  catch (Exception $e){
        //     $this->log($e->getMessage());
        // }

    }


    // //$command = "yourCommand" for example, $arguments = array of something
    // $res = Telegram::getCommandBus()->execute($res1['message']['text'], [], $commandsHandler);
    // Log::info("---2---");
    // Log::info($res);
    // Log::info("-------");
    // // return Telegram::commandsHandler(true);
});

Route::resource('tests', TestSdkController::class);
