<?php

namespace App\Http\Controllers\Api\Telegram;

use App\Http\Controllers\Controller;
use Telegram\Bot\Laravel\Facades\Telegram;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    public function index()
    {
        $updates = Telegram::getWebhookUpdates();

        Log::info("Res: ".$updates);

        if (isset($updates->message->entities) && ($updates->message->entities[0]->type == 'bot_command')) {
            $commandName = ucfirst(substr($updates->message->text, 1));
            $commandClass = 'App\\Telegram\\Commands\\'.$commandName.'Command';

            if (class_exists($commandClass)) {
                Telegram::addCommands([$commandClass]);
                Telegram::commandsHandler(true);
            } else {
                $text = "Нет такой команды \n\n";
                $text .= "Для вывода списка доступных команд введите /help".chr(10);
                Telegram::sendMessage([
                    'chat_id' => $updates->message->from->id,
                    'text' => $text
                ]);
            }
        } else {
            Log::info("Text: ". $updates->message->text);
        }
    }
}
