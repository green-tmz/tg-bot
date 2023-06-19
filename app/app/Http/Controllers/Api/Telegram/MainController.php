<?php

namespace App\Http\Controllers\Api\Telegram;

use App\Http\Controllers\Controller;
use Telegram\Bot\Laravel\Facades\Telegram;

class MainController extends Controller
{
    public static function commandsHandler()
    {
        $updates = Telegram::getWebhookUpdates();
        $text = "Добро пожаловать в бот GreenSoftPro";

        Telegram::sendMessage([
            'chat_id' => $updates->message->from->id,
            'text' => $text,
            'parse_mode' => 'html'
        ]);

        $text = "Выберите категорию:".PHP_EOL;
        $keyboard = array(
            array(
               array('text'=>'Радио','callback_data'=>'{"action":"like","count":0,"text":":like:"}'),
            ),
            array(
                array('text'=>'Запись','callback_data'=>'{"action":"like","count":0,"text":":like:"}'),
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
