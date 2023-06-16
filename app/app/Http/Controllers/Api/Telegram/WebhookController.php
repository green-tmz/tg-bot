<?php

namespace App\Http\Controllers\Api\Telegram;

use App\Http\Controllers\Controller;
use App\Telegram\Commands\AboutCommand;
use Telegram\Bot\Laravel\Facades\Telegram;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    public function index()
    {
        // Telegram::addCommands($commands);
        $commandsHandler = Telegram::commandsHandler(true);
        $updates = Telegram::getWebhookUpdates();

        if (isset($updates->message->entities) && ($updates->message->entities[0]->type == 'bot_command')) {
            $commandName = ucfirst(substr($updates->message->text, 1));
            $commandClass = 'App\\Telegram\\Commands\\'.$commandName.'Command';

            if (class_exists($commandClass)) {
                Log::info("Команда найдена: ".$commandClass);
            } else {
                Log::info("Нет такой команды");
                Log::info(print_r(Telegram::getCommands()));
                Telegram::sendMessage([
                    'chat_id' => $updates->message->from->id,
                    'text' => 'Нет такой команды'
                ]);
            }
        } else {
            Log::info("Text: ". $updates->message->text);
        }


        // //$command = "yourCommand" for example, $arguments = array of something
        // $res = Telegram::getCommandBus()->execute($res1['message']['text'], [], $commandsHandler);
        // Log::info("---2---");
        // Log::info($res);
        // Log::info("-------");
        // // return Telegram::commandsHandler(true);
    }
}
