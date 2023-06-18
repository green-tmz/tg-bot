<?php

namespace App\Http\Controllers\Api\Telegram;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Laravel\Facades\Telegram;

class MainController extends Controller
{
    public static function commandsHandler()
    {
        $updates = Telegram::getWebhookUpdates();
        $text = "Привет ".$updates->message->from->first_name.PHP_EOL;
        // $text .= "/help - Основные команды".PHP_EOL;
        // $text .= "/about - Описание бота".PHP_EOL;
        // $text .= "/start - Основное меню".PHP_EOL;

        // Telegram::sendMessage([
        //     'chat_id' => $updates->message->from->id,
        //     'text' => $text,
        //     'parse_mode' => 'html'
        // ]);

        Telegram::sendAudio([
            'chat_id' => $updates->message->from->id,
            'audio' => 'http://stream.delovaya-volna.ru/radio/HUMOR_FM_TUIMAZY.MP3',
        ]);
    }
}
