<?php

namespace App\Http\Controllers\Api\Telegram;

use App\Http\Controllers\Controller;
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

        $keyboard = array(
            array(
               array('text'=>':like:','callback_data'=>'{"action":"like","count":0,"text":":like:"}'),
               array('text'=>':joy:','callback_data'=>'{"action":"joy","count":0,"text":":joy:"}'),
               array('text'=>':hushed:','callback_data'=>'{"action":"hushed","count":0,"text":":hushed:"}'),
               array('text'=>':cry:','callback_data'=>'{"action":"cry","count":0,"text":":cry:"}'),
               array('text'=>':rage:','callback_data'=>'{"action":"rage","count":0,"text":":rage:"}')
            )
        );

        Telegram::sendMessage([
            'chat_id' => $updates->message->from->id,
            'text' => $text,
            'parse_mode' => 'html',
            'disable_web_page_preview' => false,
            'reply_markup' => json_encode(array('inline_keyboard' => $keyboard))
        ]);
    }
}
