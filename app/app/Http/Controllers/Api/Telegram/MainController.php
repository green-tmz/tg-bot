<?php

namespace App\Http\Controllers\Api\Telegram;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Laravel\Facades\Telegram;

class MainController extends Controller
{
    public $updates;

    public function __construct()
    {
        $this->updates = Telegram::getWebhookUpdates();
    }

    public function commandsHandler()
    {
        $text = "Добро пожаловать в бот GreenSoftPro";

        Telegram::sendMessage([
            'chat_id' => $this->updates->message->from->id,
            'text' => $text,
            'parse_mode' => 'html'
        ]);

        $text = "Выберите категорию:".PHP_EOL;
        $keyboard = array(
            array(
               array('text'=>'Боты','callback_data'=>'bots'),
            ),
            array(
                array('text'=>'Запись','callback_data'=>'online'),
            )
        );

        Telegram::sendMessage([
            'chat_id' => $this->updates->message->from->id,
            'text' => $text,
            'parse_mode' => 'html',
            'reply_markup' => json_encode(array('inline_keyboard' => $keyboard))
        ]);

    }

    public function callbackHandler($callback)
    {
        $method = lcfirst($callback->data).'Callback';
        if (method_exists(new self, $method)) {
            call_user_func_array([$this, $method], [$callback]);
        }
    }

    public function botsCallback($updates)
    {
        Log::info($updates);
        $text = "<b>Выберите месенджер:</b>".PHP_EOL;
        $keyboard = array(
            array(
               array('text'=>'Телеграм','callback_data'=>'tg'),
            ),
            array(
                array('text'=>'Whatsapp','callback_data'=>'wa'),
            )
        );

        Telegram::editMessageText([
            'chat_id' => $updates['from']['id'],
            'message_id' => $updates['message']['message_id'],
            'text' => $text,
            'parse_mode' => 'html',
            'reply_markup' => json_encode(array('inline_keyboard' => $keyboard))
        ]);
    }
}
